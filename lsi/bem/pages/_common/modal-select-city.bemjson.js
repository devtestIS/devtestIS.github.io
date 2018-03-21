module.exports = {
	block: 'modal',
	mix: [{block: 'fade'}],
	attrs: { id: 'select-city', tabindex: '-1' },
	content: [
		{
			elem: 'dialog',
			mods: {size: 'lg'},
			attrs: { role: "document" },
			content: [
				{
					elem: 'content',
					content: [
						{
							elem: 'header',
							content: [
								{ elem: 'title', content: 'Выбирите ваш город'},
								{ elem: 'close', attrs: { 'data-dismiss': 'modal' }, content: [
									'<i class="fa fa-times" aria-hidden="true"></i>'
								]}
							]
						},
						{
							elem: 'body',
							content: [
								{block: 'columns-radio', content: [
									((array)=>{
										let result = [];
										for(var i in array){
											result.push({
												block: 'pvx', content: [
													{
														block: 'radio',
														mods: {custom:true},
														name: 'CITY',
														content: array[i]
													}
												]
											})
										}
										return result;
									})(
										[
											'Уфа',
											'Стерлитамак',
											'Салават',
											'Октябрьский'
										]
									)
								]}
							]
						},
						{elem: 'footer', content: [
							{block: 'btn', mods: {color: 'primary'}, content: 'Применить'}
						]}
					]
				}
			]
		}
	]
};