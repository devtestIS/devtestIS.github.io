module.exports = {
	cls: 'thumbnail',
	content: [
		{
			tag: 'img',
			attrs: {src: 'http://placehold.it/333x200'}
		},
		{
			cls: 'caption',
			content: [
				{
					tag: 'h3',
					content: 'Очень-очень длинное название товара'
				},
				{
					tag: 'p',
					content: 'Очень-очень длинное описание товара, которое ну никак не сократить'
				},
				{
					tag: 'p',
					content: [
						{
							tag: 'a',
							cls: 'btn btn-primary',
							content: 'Купить'
						},
					]
				},
			]
		}
	]
};
