module.exports = function (bh) {
	bh.match('comparison-list__link', function (ctx, json) {
		ctx.tag('a')
			.attrs({
				href: '#'
			})
	})
}