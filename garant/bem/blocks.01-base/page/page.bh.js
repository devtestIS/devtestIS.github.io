module.exports = function (bh) {

    bh.match('page', function (ctx, json) {
        var options = ctx.bh.getOptions(),
            responsive = options.responsive === true ? true : false,
            lang = json.lang || 'ru',
            noscriptWarning = json.noscriptWarning || 'В вашем браузере отключен JavaScript. Многие элементы сайта могут работать некорректно.',
            oldBrowserWarning = json.oldBrowserWarning || 'Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a rel="nofollow" onclick="window.open(this.href, \'_blank\');return false;" href="http://browsehappy.com/">обновите свой браузер</a> чтобы улучшить взаимодействие с сайтом.';
        
        var viewport;
        
        if (json.responsiveDisable === true) {
            // responsive = false;
            viewport = 'width=device-width, initial-scale=1.0, maximum-scale=1.0';
        } else {
            viewport = 'width=device-width, initial-scale=1';
        }
        
        json.favicons = json.favicons || [
                {elem: 'favicon', href: '../../../favicons/touch-icon-180x180-iphone-6-plus.png', size: '180x180'},
                {elem: 'favicon', href: '../../../favicons/touch-icon-152x152-ipad-retina.png', size: '152x152'},
                {elem: 'favicon', href: '../../../favicons/touch-icon-120x120-iphone-retina.png', size: '120x120'},
                {elem: 'favicon', href: '../../../favicons/touch-icon-76x76-ipad.png', size: '76x76'},
                {elem: 'favicon', href: '../../../favicons/touch-icon-57x57-iphone.png', size: '57x57'},
                {elem: 'favicon', href: '../../../favicons/favicon-32x32.png', size: '32x32'},
                {elem: 'favicon', href: '../../../favicons/favicon.ico', size: '16x16'},
            ];

        ctx.bem(false)
            .tag('body')
            .tParam('lang', lang)
            .tParam('responsive', responsive)
            .content([
                '<!--noindex-->',
                {elem: 'noscript', content: noscriptWarning},
                {elem: 'browsehappy', content: oldBrowserWarning},
                '<!--/noindex-->',
                ctx.content(),
                {block: 'deferred-body-strings', tag: ''},
                json.scripts
            ], true);

        return [
            '<!DOCTYPE html>',
            {
                block: 'conditional-comment',
                condition: '< IE 8',
                content: '<html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="' + lang + '">'
            },
            {
                block: 'conditional-comment',
                condition: 'IE 8',
                content: '<html class="no-js lt-ie10 lt-ie9" lang="' + lang + '">'
            },
            {
                block: 'conditional-comment',
                condition: 'IE 9',
                content: '<html class="no-js lt-ie10" lang="' + lang + '">'
            },
            {
                block: 'conditional-comment',
                condition: '> IE 9',
                msieOnly: false,
                content: '<html class="no-js" lang="' + lang + '">'
            },
            {
                elem: 'head',
                content: [
                    {elem: 'meta', attrs: {charset: 'utf-8'}},
                    {elem: 'meta', attrs: {'http-equiv': 'X-UA-Compatible', content: 'IE=edge'}},
                    responsive ? {
                        elem: 'meta',
                        attrs: {name: 'viewport', content: viewport}
                    } : '',
                    {elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}},
                    {elem: 'meta', attrs: {name: 'SKYPE_TOOLBAR', content: 'SKYPE_TOOLBAR_PARSER_COMPATIBLE'}},
                    {tag: 'title', content: json.title},
                    {block: 'ua'},
                    json.styles,
                    {block: 'html5shiv-respond'},
                    {block: 'deferred-head-strings', tag: ''},
                    json.head,
                    json.favicons
                ]
            },
            json,
            '</html>'
        ];
    });

};
