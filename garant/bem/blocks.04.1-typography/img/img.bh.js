module.exports = function (bh) {
    bh.match('img', function (ctx, json) {
        ctx.tag('img')
            .attr('src', json.src)
            .attr('alt', '');
    });

};
