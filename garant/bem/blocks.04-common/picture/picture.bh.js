module.exports = function (bh) {

    bh.match('picture', function (ctx, json) {
        ctx.bem(false).tag('picture');

        var sources = [];

        if (json.xl) { // for full width should be 1200px+, likely 1400 - 1600px
            sources.push({
                elem: 'source',
                srcset: json.xl,
                media: '(min-width: 1200px)'
            });
        }

        if (json.md) { // for full width should be 1199px
            sources.push({
                elem: 'source',
                srcset: json.md,
                media: '(min-width: 992px)'
            });
        }

        if (json.sm) { // for full width should be 991px
            sources.push({
                elem: 'source',
                srcset: json.sm,
                media: '(min-width: 768px)'
            });
        }

        if (json.xs) { // for full width should be 767px
            sources.push({
                elem: 'source',
                srcset: json.xs,
                media: '(max-width: 767px)'
            });
        }

        ctx.content([
            {
                block: 'conditional-comment',
                condition: 'IE 9',
                content: '<video style="display: none;">'
            },
            sources,
            {
                block: 'conditional-comment',
                condition: 'IE 9',
                content: '</video>'
            },
            {
                tag: 'img',
                cls: 'img-responsive',
                attrs: {
                    alt: '',
                    src: 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'
                }
            },
        ]);
    });

};
