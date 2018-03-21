module.exports = function (bh) {
	bh.match('comparison-small-item__remove', function (ctx, json) {
		ctx.tag('a')
			.attrs({
				href: '#'
			})
	})
}