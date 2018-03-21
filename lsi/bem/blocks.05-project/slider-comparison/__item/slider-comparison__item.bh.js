module.exports = function (bh) {
	bh.match('slider-comparison__item', function (ctx, json) {
		var optionText = json.option ? 'Фильтр сетевой со встроенным стабилизатором Ресанта С 2000, чёрный, матовый, без заземления' : '800'
		ctx.content([
			{
				elem: 'remove',
				content: '×'
			},
			{mix: {block: 'star'}, content: [
				{block: 'star-rating', mix: {block: 'pvs phl'}, mods: {disabled: true}},
				{
					elem: 'wrap-img',
					content: [
						{
							elem: 'img',
							tag: 'img',
							attrs: {
								src: '../../../images/' + json.img
							}
						}
					]
				}
			]},

			{
				elem: 'control',
				mix: [{block: 'text-center'}],
				content: [
					{
						block: 'btn',
						mods: {color:'primary'},
						content: 'В КОРЗИНУ'
					}
				]
			},
			{
				elem: 'title',
				attrs:{
					'data-eq': true
				},
				content: [
					json.title
				]
			},
			{
				elem: 'feature',
				mods: {price:true},
				attrs:{
					'data-eq': true
				},
				content: '8 229 р'
			},
			{
				elem: 'feature',
				attrs:{
					'data-eq': true
				},
				content: '800'
			},
			{
				elem: 'feature',
				attrs:{
					'data-eq': true
				},
				content: '900'
			},
			{
				elem: 'feature',
				attrs:{
					'data-eq': true
				},
				content: optionText
			},
			{
				elem: 'feature',
				attrs:{
					'data-eq': true
				},
				content: '470'
			},
			{
				elem: 'feature',
				attrs:{
					'data-eq': true
				},
				content: '151'
			},
			{
				elem: 'feature',
				attrs:{
					'data-eq': true
				},
				content: '5,5'
			},
			
		], true)
	})
}