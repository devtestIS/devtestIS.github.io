module.exports = function (bh) {

    bh.match('embed-responsive', function (ctx, json) {
        ctx.mod('ratio', '16by9');
    });

};
