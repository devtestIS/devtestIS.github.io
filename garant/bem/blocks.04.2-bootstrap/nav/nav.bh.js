module.exports = function(bh) {

    bh.match('nav', function(ctx, json) {
        ctx
            .tag('ul')
            .mod('type', 'tabs');
    });

};
