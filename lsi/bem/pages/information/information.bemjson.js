module.exports = {
	block: 'page',
	title: 'Информация клиентам',
	head: [{elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}}],
	head: [{
		elem: 'link',
		attrs: {
			href: 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800',
			rel: 'stylesheet',
			type: 'text/css'
		}
	}],
	head: [{
		elem: 'link',
		attrs: {
			href: 'https://fonts.googleapis.com/css?family=PT+Sans:400,700',
			rel: 'stylesheet',
			type: 'text/css'
		}
	}],
	styles: [{elem: 'css', url: '../_merged/_merged.css'}],
	scripts: [{elem: 'js', url: '../_merged/_merged.js'}, {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}],
	content: [
		require('../_common/header.bemjson.js'),
		require('../_common/menu.bemjson.js'),
		{
			block: 'container',
			content: [
				{
					block: 'breadcrumb',
					content: [
						{
							elem: 'item',
							content: 'Главная'
						},
						{
							elem: 'active',
							content: 'Каталог товаров'
						}
					]
				},
				{
					block: 'title-page',
					mods: {inner: true},
					content: 'Способы оплаты'
				},
				{
					block: 'row',
					content: [
						{
							elem: 'col',
							mods: {md: '3', sm: '4'},
							content: [
								{
									block: 'menu-page',
									content: [
										{
											elem: 'item',
											content: 'Профиль пользователя'
										},
										{
											elem: 'item',
											content: 'Заказы'
										},
										{
											elem: 'item',
											content: 'Корзина'
										}
									]
								}
							]
						},
						{
							elem: 'col',
							mods: {md: '9', sm: '8'},
							content: [
								{
									block: 'information',
									content: [
										{
											block: 'information-menu',
											content: [
												{
													elem: 'item',
													mods: {active: true},
													content: [
														{
															elem: 'img',
															url: 'information-icon/payment.png'
														},
														{
															elem: 'title',
															content: 'Способы оплаты'
														}
													]
												},
												{
													elem: 'item',
													content: [
														{
															elem: 'img',
															url: 'information-icon/ufa.png'
														},
														{
															elem: 'title',
															content: 'Доставка по УФЕ'
														}
													]
												},
												{
													elem: 'item',
													content: [
														{
															elem: 'img',
															url: 'information-icon/shipping.png'
														},
														{
															elem: 'title',
															content: 'Доставка по России'
														}
													]
												},
												{
													elem: 'item',
													content: [
														{
															elem: 'img',
															url: 'information-icon/pickup.png'
														},
														{
															elem: 'title',
															content: 'Самовывоз'
														}
													]
												},

											]
										},
										{
											elem: 'content',
											content: [
												{
													block: 'h2',
													mix: [{block: 'mbl'}, {block: 'mts'}],
													content: 'Физические лица'
												},
												{
													block: 'ul',
													mix: [{block: 'mbl'}],
													mods: {primary: true},
													content: [
														{
															elem: 'li',
															content: 'Наличными курьеру - курьер привозит вам заказ, вы отдаете ему наличные'
														},
														{
															elem: 'li',
															content: 'Наличными на кассе - вы оплачиваете заказ на кассе магазина наличными'
														},
														{
															elem: 'li',
															content: 'Банковской картой на кассе - вы оплачиваете заказ банковской картой на кассе магазина'
														},

													]
												},
												{
													block: 'h2',
													content: 'Юридические лица'
												},
												'Оплата переводом на наш расчетный счет. При оформлении заказа в поле "Комментарии к заказу" укажите реквизиты своей организации, для ускорения оформления счета на оплату. После оформления заказа с вами свяжется менеджер магазина, и передаст вам счет на оплату заказа, по факсу или email.'

											]
										}

									]
								},

							]
						}
					]
				}
			]
		},
		require('../_common/footer.bemjson.js')
	]
};