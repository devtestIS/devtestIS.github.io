module.exports = function (bh) {
	bh.match('slider-shop__item', function (ctx, json) {
		ctx.content([
			{
				block: 'lightbox-link',
				url: ctx.content()
			}
		], true)
	})
}