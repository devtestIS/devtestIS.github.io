var fs = require('fs'),
    path = require('path'),
    production = process.env.YENV ? process.env.YENV.trim() === 'production' : false,
    config = require('../config'),
    languages = config.languages,
    responsive = config.responsive,
    replacements = config.replacements,
    levels = config.levels,
    browsers = config.browsers;


/**
 * Windows-фикс для путей в конфиге БЭМ-уровней
 */
levels = levels.map(function (level) {
    if (typeof level === 'object') {
        level.path = level.path.replace(/(\/|\\)/g, path.sep);
    } else {
        level = level.replace(/(\/|\\)/g, path.sep);
    }
    return level;
});


/**
 * Техники используемые для сборки
 */
var techs = {
    // базовые техники
    fileProvider: require('enb/techs/file-provider'),
    enbBemTechs: require('enb-bem-techs'),

    // html
    bemjsonToBemdecl: require('./techs/bemjson-to-bemdecl'),
    bhCommonjs: require('./techs/bh-commonjs'),
    bemjsonToHtml: require('./techs/bemjson-to-html'),
    beautifyHtml: require('./techs/beautify-html'),

    // css, js
    cssSass: require('./techs/css-sass'),
    jsIncludes: require('./techs/js-includes')
};

/**
 * Пути используемые в сборке
 */
var pagesPath = path.join('bem', 'pages'),
    pagesPathMask = path.join('bem', 'pages', '*'),
    mergedPath = path.join('bem', 'pages', '_merged'),
    globalsJsPath = path.join('bem', 'globals', 'globals.js'),
    globalsScssPath = path.join('bem', 'globals', 'globals.scss');

/**
 * Настройка сборки
 */
module.exports = function (config) {

    // Создаем директорию для merged-бандла
    try {
        fs.statSync(mergedPath);
    }
    catch (e) {
        fs.mkdirSync(mergedPath);
    }

    // Сборка страниц (в том числе предоставляет BEMDECL-файлы для merged-бандла со статикой)
    config.nodes(pagesPathMask, function (nodeConfig) {
        var node = path.basename(nodeConfig.getPath());

        // Для merged-бандла есть отдельный конфиг ниже
        if (node === '_merged' || node === '_common') {
            return;
        }

        // Указываем поддерживаемые языки
        nodeConfig.setLanguages(languages);

        var disableLintIds = ['W005'];
        if (responsive !== true) {
            disableLintIds.push('W003');
        }

        nodeConfig.addTechs([
            // essential
            [techs.fileProvider, {target: '?.bemjson.js'}],
            [techs.bemjsonToBemdecl],
            [techs.enbBemTechs.levels, {levels: levels}],
            [techs.enbBemTechs.deps],
            [techs.enbBemTechs.files],

            // html
            [techs.bhCommonjs, {
                bhFilename: require.resolve('./lib/bh.js'),
                bhOptions: {
                    production: production,
                    responsive: responsive,
                    replacements: replacements,
                    jsAttrName: 'data-bem',
                    jsAttrScheme: 'json'
                }
            }],
            [techs.bemjsonToHtml],
            [techs.beautifyHtml, {
                sourceTarget: '?.html',
                destTarget: '?.beauty.html',
                disableLintIds: disableLintIds

            }]
        ]);

        nodeConfig.addTarget('?.beauty.html');
    });


    // Настраиваем сборку merged-бандла
    config.node(mergedPath, function (nodeConfig) {
        // Указываем поддерживаемые языки
        nodeConfig.setLanguages(languages);

        // Копируем BEMDECL-файлы в merged-бандл
        var bemdeclFiles = [];
        fs.readdirSync(pagesPath).forEach(function (page) {
            if (page === '_merged' || page === '_common') {
                return;
            }

            var node = path.join('bem', 'pages', page),
                target = page + '.bemdecl.js';

            if (!fs.lstatSync(node).isDirectory()) {
                return;
            }

            nodeConfig.addTech([techs.enbBemTechs.provideBemdecl, {
                node: node,
                target: target
            }]);

            bemdeclFiles.push(target);
        });

        // Объединяем скопированные BEMDECL-файлы
        nodeConfig.addTech([techs.enbBemTechs.mergeBemdecl, {sources: bemdeclFiles}]);

        // Обычная сборка бандла
        nodeConfig.addTechs([
            [techs.enbBemTechs.levels, {levels: levels}],
            [techs.enbBemTechs.files],
            [techs.enbBemTechs.deps],

            // css, js
            [techs.cssSass, {
                sass: {outputStyle: 'expanded'},
                responsive: responsive,
                globals: [globalsScssPath],
                autoprefixer: {browsers: browsers}
            }],
            [techs.jsIncludes, {
                globals: [globalsJsPath]
            }],
            [techs.jsIncludes, {
                sourceSuffixes: 'async.js',
                target: '?.async.js'
            }]
        ]);

        nodeConfig.addTargets([
            '?.css',
            '?.js',
            '?.async.js'
        ]);

        // Сборка JS-lang-файлов
        languages.forEach(function (lang) {
            nodeConfig.addTech([techs.jsIncludes, {
                sourceSuffixes: 'i18n.' + lang + '.js',
                target: '?.i18n.' + lang + '.js'
            }]);
            nodeConfig.addTarget('?.i18n.' + lang + '.js');
        });


        // Сборка минифицированных CSS и JS
        if (production) {
            nodeConfig.addTechs([
                [techs.cssSass, {
                    target: '?.min.css',
                    responsive: responsive,
                    globals: [globalsScssPath],
                    autoprefixer: {browsers: browsers},
                    minify: true,
                    cleancss: {compatibility: 'ie8'}
                }],
                [techs.jsIncludes, {
                    target: '?.min.js',
                    globals: [globalsJsPath],
                    minify: true,
                    uglifyjs: {
                        warnings: true
                    }
                }],
                [techs.jsIncludes, {
                    sourceSuffixes: 'async.js',
                    target: '?.async.min.js',
                    minify: true,
                    uglifyjs: {
                        warnings: true
                    }
                }]
            ]);
            nodeConfig.addTargets([
                '?.min.css',
                '?.min.js',
                '?.async.min.js'
            ]);

            languages.forEach(function (lang) {
                nodeConfig.addTech([techs.jsIncludes, {
                    sourceSuffixes: 'i18n.' + lang + '.js',
                    target: '?.i18n.' + lang + '.min.js',
                    minify: true,
                    uglifyjs: {
                        warnings: true
                    }
                }]);
                nodeConfig.addTarget('?.i18n.' + lang + '.min.js');
            });
        }
    });

    // // Сборка документации и примеров
    // config.includeConfig('enb-bem-examples');
    // config.includeConfig('enb-bem-docs');
    //
    // var examples = config.module('enb-bem-examples').createConfigurator('examples'),
    //     docs = config.module('enb-bem-docs').createConfigurator('docs', 'examples');
    //
    // examples.configure({
    //     destPath: path.join('bem', 'examples'),
    //     levels: levels,
    //     inlineBemjson: true
    // });
    // docs.configure({
    //     destPath: path.join('bem', 'docs'),
    //     levels: levels,
    //     exampleSets: ['examples']
    // });
};
