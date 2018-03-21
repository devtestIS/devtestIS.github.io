module.exports = function (bh) {
	bh.match('information-menu__item', function (ctx, json) {
		ctx.tag('a')
			.attrs({
				href: '#'
			})
	})
}