module.exports = function (bh) {
	bh.match('information-menu__img', function (ctx, json) {
		ctx.content([
			{
				block: 'img-responsive',
				url: json.url
			}
		], true)
	})
}