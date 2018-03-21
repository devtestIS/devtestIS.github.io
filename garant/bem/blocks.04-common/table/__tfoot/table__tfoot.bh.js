module.exports = function (bh) {
	bh.match('table__tfoot', function (ctx, json) {
		if(!ctx.ctx.mods.pseudo){
			ctx.tag('tfoot')
		}
	})
}