module.exports = function (bh) {
	bh.match('comparison-small-list__link', function (ctx, json) {
		ctx.tag('a')
			.attrs({
				href: '#'
			})
	})
}