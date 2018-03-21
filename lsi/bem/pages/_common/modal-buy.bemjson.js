module.exports = {
	block: 'modal',
	mix: [{block: 'fade'}],
	attrs: { id: 'modal_buy', tabindex: '-1' },
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
								{
									elem: 'title',
									content: 'Товар добавлен в корзину'
								},
								{ elem: 'close', attrs: { 'data-dismiss': 'modal' }, content: [
									'<i class="fa fa-times" aria-hidden="true"></i>'
								]},
							]
						},
						{
							elem: 'body',
							content: [
								{block: 'mbm', content: [
									'Товар ',
									'<a href="#">наименование товара</a>',
									' добавлен в вашу корзину покупок'
								]},
								{mix: [{block: 'row'}], content: [
									{mix: [{block: 'row', elem: 'col', mods: {xs: 12, sm: 6}}, {block: 'mbm'}], content:[
										{block: 'btn', mods: {block: true}, attrs: { 'data-dismiss': 'modal' }, content: 'Продолжить покупки'}
									]},
									{mix: [{block: 'row', elem: 'col', mods: {xs: 12, sm: 6}}, {block: 'mbm'}], content:[
										{block: 'btn', mods: {color: 'primary', block: true}, attrs: { 'data-dismiss': 'modal' }, content: 'Оформить заказ'}
									]}
								]},
								{
									block: 'h3',
									mix: [{block: 'pbx'}, {block: 'mtl'}],
									content: 'С этим товаром покупают'
								},
								{
									block: 'row',
									content: [
										{
											elem: 'col',
											mods: {md: '4', sm: '6'},
											content: [
												{
													block: 'card-product',
													mods: {'no-shadow':true},
													label2: {availability: 'В наличии'},
													title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
													img: 'products/img-1.jpg',
													price: '34 224 р',
													features: true
												}
											]
										}, 
										{
											elem: 'col',
											mods: {md: '4', sm: '6'},
											content: [
												{
													block: 'card-product',
													mods: {'no-shadow':true},
													added: true,
													label: {new: 'Новинка'},
													label2: {availability: 'В наличии'},
													title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
													img: 'products/img-1.jpg',
													price: '34 224 р',
													features: true
												}
											]
										},
										{
											elem: 'col',
											mods: {md: '4', sm: '6'},
											mix: [{block: 'hidden-sm'}],
											content: [
												{
													block: 'card-product',
													mods: {'no-shadow':true},
													label: {action: 'Акция'},
													label2: {availability: 'В наличии'},
													title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
													img: 'products/img-1.jpg',
													price: '34 224 р',
													features: true
												}
											]
										}
									]
								},
								{
									block: 'checkbox',
									mods: {custom: true},
									content: [
										'Не показывать это окно 1ч'
									]
								}
							]
						}
					]
				}
			]
		}
	]
};