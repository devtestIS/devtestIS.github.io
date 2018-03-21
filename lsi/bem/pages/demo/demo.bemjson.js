module.exports = {
    block: 'page',
    title: 'Демо для сборки',
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [{elem: 'js', url: '../_merged/_merged.js'}, {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}],
    content: [
        require('../_common/header.bemjson.js'),
        {
            block: 'container',
            content: require('../_common/demo/products-tiles.bemjson.js'),
        },
        require('../_common/footer.bemjson.js')
    ]
};
