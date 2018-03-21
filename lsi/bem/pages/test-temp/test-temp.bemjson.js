module.exports = {
    block: 'page',
    title: 'тестовая ',
    head: [{elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}}],
    head: [{
        elem: 'link',
        attrs: {
            href: 'https://fonts.googleapis.com/css?family=PT+Sans:400,700',
            rel: 'stylesheet',
            type: 'text/css'
        }
    }],
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [{elem: 'js', url: '../_merged/_merged.js'}, {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}],
    content: [
        {
            block: 'container',
            content: [
                {
                    block: 'test-temp',
                    content: [
                        {
                            elem: 'trigger',
                            content: 'test block'
                        },
                        {
                            block: 'link',
                            mix: [
                                {block: 'test-temp', elem: 'link'},
                            ],
                            url: '#444',
                            content: 'link'
                        }
                    ]
                },

            ]
        }
    ]
};
