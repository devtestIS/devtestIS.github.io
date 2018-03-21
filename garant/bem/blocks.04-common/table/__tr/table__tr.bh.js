module.exports = function (bh) {
    bh.match('table__tr', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('tr')
        }
    })
}