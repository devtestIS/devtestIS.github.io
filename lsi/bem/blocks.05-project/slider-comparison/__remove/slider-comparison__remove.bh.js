module.exports = function (bh) {
	bh.match('slider-comparison__remove', function (ctx, json) {
		ctx.tag('a')
			.attrs({
				href: '#'
			})
	})
}