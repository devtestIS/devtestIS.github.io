module.exports = function (bh) {
	bh.match('slider-comparison__feature', function (ctx, json) {
		ctx.content([
			{
				elem: 'span',
				tag: 'span',
				content: ctx.content()
			}
		], true)
	})
}