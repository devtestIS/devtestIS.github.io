
module.exports = function(bh) {

    bh.match('img_lazyload', function(ctx, json) {
        var url = '../../../images/' + json.url;
        ctx.mix([{block: 'lazyload'}])
          .attr('data-src', url)
          .attr('src', 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7', true);
    });

};
