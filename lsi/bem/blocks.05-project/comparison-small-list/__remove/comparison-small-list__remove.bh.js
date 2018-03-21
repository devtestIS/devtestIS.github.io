module.exports = function (bh) {
	bh.match('comparison-small-list__remove', function (ctx, json) {
		ctx.tag('a')
			.attrs({
				href: '#'
			})
	})
}