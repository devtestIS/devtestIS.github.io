module.exports = function (bh) {
    bh.match('company__email', function (ctx, json) {
        ctx.tag('a');
        ctx.attr('href', 'mailto:' +  json.content);
    });
};

