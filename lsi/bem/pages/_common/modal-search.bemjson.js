module.exports = {
	block: 'modal',
	mix: [{block: 'fade'}],
	attrs: {
		id: 'search-mob',
		tabindex: '-1'
	},
	content: [
		{
			elem: 'dialog',
			mods: {size: 'lg'},
			attrs: {
				role: "document"
			},
			content: [
				{
					elem: 'content',
					content: [
						{
							elem: 'body',
							content: [
								
							]
						},
					]
				}
			]
		}
	]
};