module.exports = function (bh) {
	bh.match('smart-filter__popover', function (ctx, json) {
		ctx.mix([{block: 'popover'}, {block: 'right'}])
			.content([
				{
					elem: 'arrow'
				},
				{
					block: 'popover-content',
					content: [
						ctx.content()
					]
				}
			], true)
	})
}