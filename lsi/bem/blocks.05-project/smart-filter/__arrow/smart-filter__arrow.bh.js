module.exports = function (bh) {
	bh.match('smart-filter__arrow', function (ctx, json) {
		ctx.bem(false)
			.cls('arrow')
	})
}