module.exports = function(bh) {
    bh.match('video-youtube', function(ctx, json) {
        var width = json.width || '100%',
            height = json.height || '532',
            url = json.url || 'https://www.youtube.com/embed/xlcywgEMuGI';
        ctx.tag('iframe')
            .attrs({
                width: width,
                height: height,
                src: url + '?enablejsapi=1&version=3&playerapiid=ytplayer',
                frameborder: '0',
                allowfullscreen: 'true',
                allowscriptaccess: 'always'
            });
    });
};

