module.exports = {
    block: 'page',
    title: 'Текстовая',
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [{elem: 'js', url: '../_merged/_merged.js'}, {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}],
    content: [
        require('../_common/header.bemjson.js'),
        {
            block: 'container',
            content: [
                {
                    block: 'search',
                    mix: [{block: 'mtl'}],
                    placeholder: 'Поиск товара'
                },
                require('../_common/demo/text.bemjson.js')
            ]
        },
        require('../_common/footer.bemjson.js')
    ]
};
