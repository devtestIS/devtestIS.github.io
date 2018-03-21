module.exports = function (bh) {

    bh.match('youtube', function (ctx, json) {

        var responsive = ctx.bh.getOptions().responsive === true ? true : false,
            lazyload = !!ctx.mod('lazyload'),
            config = {
                src: '//www.youtube.com/embed/' + json.video + '?rel=0&showinfo=0',
                width: ctx.attr('width') || 560,
                height: ctx.attr('height') || 315
            };

        ctx.attrs({
            src: null,
            width: null,
            height: null
        }, true);

        var player = {
            elem: 'player',
            tag: 'iframe',
            mods: {},
            mix: [],
            attrs: {
                width: config.width,
                height: config.height,
                allowfullscreen: true
            }
        };

        if (lazyload) {
            player.mix.push({block: 'lazyload'});
            player.attrs['data-src'] = config.src;
        } else {
            player.attrs.src = config.src;
        }

        if (responsive) {
            var currentRatio = config.width / config.height,
                embedRatio = '16by9';

            if (Math.abs(currentRatio - 4/3) < Math.abs(currentRatio - 16/9)) {
                embedRatio = '4by3';
            }
            ctx.mix({block: 'embed-responsive', mods: {ratio: embedRatio}});

            player.mix.push({block: 'embed-responsive', elem: 'item'});
        }

        ctx.content([
            '<!--<?/* Изменять нужно только ID видео а не всю ссылку */?>-->',
            player
        ]);

    });

};
