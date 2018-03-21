module.exports = function(bh) {

    bh.match('nav_type_tabs', function(ctx, json) {
        if (ctx.mod('orientation') === 'stacked') {
            ctx.mod('orientation', null, true);
        }
    });

};
