module.exports = function (bh) {
    bh.match('svg__path', function (ctx, json) {
        ctx.tag('path');
        
    });
};