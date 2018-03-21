module.exports = function (bh) {
    bh.match('fa', function (ctx, json) {
        ctx.tag('i').cls(json.icon && 'fa-'+json.icon);
    })
}