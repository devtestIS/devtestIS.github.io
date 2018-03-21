module.exports = function (bh) {

    bh.match('picture', function (ctx, json) {
        ctx.tag('picture');

        var src = typeof json.src === 'object' ? json.src : {},
            sources = [];

        if (src.lg) { // for full width should be 1200px+, likely 1400 - 1600px
            sources.push({
                elem: 'source',
                srcset: src.lg,
                media: '(min-width: 1200px)'
            });
        }

        if (src.md) { // for full width should be 1199px
            sources.push({
                elem: 'source',
                srcset: src.md,
                media: '(min-width: 992px)'
            });
        }

        if (src.sm) { // for full width should be 991px
            sources.push({
                elem: 'source',
                srcset: src.sm,
                media: '(min-width: 768px)'
            });
        }

        if (src.xs) { // for full width should be 767px
            sources.push({
                elem: 'source',
                srcset: src.xs,
                media: '(max-width: 767px)'
            });
        }

        if (ctx.mod('lazyload')) {
            for (var i = 0; i < sources.length; i++) {
                // sources[i].cls = 'lazyload';
                // sources[i].mix = [{block: 'lazyload'}];
                sources[i].attrs = sources[i].attrs || {};
                sources[i].attrs.srcset = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
                sources[i].attrs['data-srcset'] = sources[i].srcset;
                delete sources[i].srcset;
            }
        }

        var img = {
            block: 'img',
            attrs: {
                alt: ctx.attr('alt') || ''
            },
            mods: {
                lazyload: ctx.mod('lazyload'),
                responsive: ctx.mod('responsive')
            }
        };

        if (!ctx.mod('lazyload')) {
            img.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
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
            img
        ]);
    });

};
