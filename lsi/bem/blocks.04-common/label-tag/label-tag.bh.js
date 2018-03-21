module.exports = function (bh) {
	bh.match('label-tag', function (ctx, json) {
		ctx.tag('label')
			.bem(false)
	})
}