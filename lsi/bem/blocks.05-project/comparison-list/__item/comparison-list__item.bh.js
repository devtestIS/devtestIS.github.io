module.exports = function (bh) {
	bh.match('comparison-list__item', function (ctx, json) {
		ctx.content([
			{
				elem: 'span',
				tag: 'span',
				content: ctx.content()
			}
		], true)
	})
}