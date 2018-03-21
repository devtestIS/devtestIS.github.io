module.exports = function (bh) {
    bh.match('table__tbody', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('tbody')
        }
    })
}