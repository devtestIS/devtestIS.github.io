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
					content: 'Товар'
				},
				{
					tag: 'p',
					content: 'Описание'
				},
				{
					tag: 'p',
					content: [
						{
							tag: 'a',
							cls: 'btn btn-primary',
							content: 'Купить'
						}
					]
				},
			]
		}
	]
};
