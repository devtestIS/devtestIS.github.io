module.exports = function (bh) {
    bh.match('table__col', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('col')
        }
    })
}
