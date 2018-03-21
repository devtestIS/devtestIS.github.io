module.exports = function (bh) {
    bh.match('table__td', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('td')
        }
    })
}