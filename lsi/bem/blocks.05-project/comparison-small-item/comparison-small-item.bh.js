module.exports = function (bh) {
	bh.match('comparison-small-item', function (ctx, json) {
		ctx.content([
			{mix: {block: 'star'}, content: [
				{block: 'star-rating', mods: {disabled: true}},
				{
					elem: 'wrap-img',
					content: [
						{
							block: 'img-responsive',
							url: json.img
						}
					]
				}
			]},
			{
				elem: 'title',
				content: ctx.content()
			},
			{
				elem: 'control',
				content: [
					{
						elem: 'price',
						content: '8 229 р'
					},
					{
						block: 'btn',
						mods: {color: 'primary'},
						content: 'В КОРЗИНУ'
					}
				]
			},
			{
				elem: 'remove',
				content: '×'
			}
		], true)
	})
}