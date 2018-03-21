module.exports = [
    {
        tag: 'h2',
        content: 'Обычная картинка'
    },
    {
        block: 'img',
        src: 'http://placehold.it/1200x1600',
        attrs: {
            width: 1200,
            height: 1600
        },
        alt: 'Обычная картинка'
    },
    {
        tag: 'h2',
        content: 'Адаптивная картинка'
    },
    {
        block: 'img',
        mods: {responsive: true},
        src: 'http://placehold.it/1600x201',
        alt: 'Адаптивная картинка'
    },
    {
        tag: 'h2',
        content: 'Обычная ленивая картинка'
    },
    {
        block: 'img',
        mods: {lazyload: true},
        src: 'http://placehold.it/1200x202',
        attrs: {
            width: 1200,
            height: 202
        },
        alt: 'Обычная ленивая картинка'
    },
    {
        tag: 'h2',
        content: 'Адаптивная ленивая картинка'
    },
    {
        block: 'img',
        mods: {responsive: true, lazyload: true},
        src: 'http://placehold.it/1600x203',
        alt: 'Адаптивная ленивая картинка'
    },
    {
        tag: 'h2',
        content: 'Умная картинка '
    },
    {
        block: 'picture',
        src: {
            xs: 'http://placehold.it/767x204/3c763d',
            sm: 'http://placehold.it/991x204/31708f',
            md: 'http://placehold.it/1199x204/8a6d3b',
            lg: 'http://placehold.it/1200x204/a94442'
        },
        alt: 'Умная картинка'
    },
    {
        tag: 'h2',
        content: 'Умная адаптивная картинка'
    },
    {
        block: 'picture',
        mods: {responsive: true},
        src: {
            xs: 'http://placehold.it/767x205/3c763d',
            sm: 'http://placehold.it/991x205/31708f',
            md: 'http://placehold.it/1199x205/8a6d3b',
            lg: 'http://placehold.it/1400x205/a94442'
        },
        alt: 'Умная адаптивная картинка',
    },
    {
        tag: 'h2',
        content: 'Умная адаптивная ленивая картинка'
    },
    {
        block: 'picture',
        mods: {lazyload: true, responsive: true},
        src: {
            xs: 'http://placehold.it/767x206/3c763d',
            sm: 'http://placehold.it/991x206/31708f',
            md: 'http://placehold.it/1199x206/8a6d3b',
            lg: 'http://placehold.it/1400x206/a94442'
        },
        alt: 'Умная адаптивная ленивая картинка',
    },
    '</div>',
    {
        block: 'container',
        content: {
            tag: 'h2',
            content: 'Обычный фон'
        }
    },
    {
        block: 'background',
        src: 'http://placehold.it/1600x207',
        content: 'Обычный фон<br/><br/><br/>Обычный фон'
    },
    {
        block: 'container',
        content: {
            tag: 'h2',
            content: 'Ленивый фон'
        }
    },
    {
        block: 'background',
        mods: {lazyload: true},
        src: 'http://placehold.it/1600x208',
        content: 'Ленивый фон<br/><br/><br/>Ленивый фон'
    },
    {
        block: 'container',
        content: {
            tag: 'h2',
            content: 'Адаптивный ленивый фон'
        }
    },
    {
        block: 'background',
        mods: {lazyload: true},
        src: {
            xs: 'http://placehold.it/767x209/3c763d',
            sm: 'http://placehold.it/991x209/31708f',
            md: 'http://placehold.it/1199x209/8a6d3b',
            lg: 'http://placehold.it/1600x209/a94442'
        },
        content: 'Адаптивный ленивый фон<br/><br/><br/>Адаптивный ленивый фон'
    },
    '<div class="container">',
    {
        tag: 'h2',
        content: 'Обычное видео YouTube'
    },
    {
        block: 'youtube',
        video: 'yvRn76Fqyzc',
        attrs: {
            width: 640,
            height: 480
        }
    },
    {
        tag: 'h2',
        content: 'Ленивое видео YouTube'
    },
    {
        block: 'youtube',
        mods: {lazyload: true},
        video: 'yvRn76Fqyzc',
        attrs: {
            width: 640,
            height: 360
        }
    }
];
