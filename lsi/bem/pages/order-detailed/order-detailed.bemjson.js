module.exports = {
	block: 'page',
	title: 'Заказы детально',
	head: [{elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}}],
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
					content: 'Торсионный сверхпроводник: основные моменты'
				},
				{
					block: 'row',
					content: [
						{
							elem: 'col',
							mods: {md: '9', sm: '8', 'md-push': '3', 'sm-push': '4'},
							content: [
								{
									block: 'order-detailed',
									content: [
										{
											elem: 'head',
											content: [
												{
													elem: 'title',
													content: 'Состояние заказа'
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Статус:'
														},
														{
															elem: 'status',
															mods: {color: 'success'},
															content: 'Ожидает подтверждения'
														},
														{
															block: 'span',
															content: '(08.02.2016 11:05:47)'
														}
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Оплачен:'
														},
														{
															block: 'span',
															content: 'Нет'
														}
													]
												},
												{
													block: 'btn',
													mods: {color: 'primary'},
													content: 'ОПЛАТИТЬ'
												}
											]
										},
										{
											elem: 'body',
											content: [
												{
													elem: 'title',
													content: 'Состав заказа'
												},
												{
													block: 'pseudo-table',
													attrs: {
														'data-auto-title': 'true'
													},
													mods: {striped: 'even', bordered: true},
													mix: [
														{block: 'order-detailed', elem: 'table'}
													],
													content: [
														{
															elem: 'thead',
															content: [
																{
																	elem: 'tr',
																	content: [
																		{
																			elem: 'th',
																			mods: {colspan:true},
																		},
																		{
																			elem: 'th',
																			mix: [
																				{block: 'hidden-xs'},
																				{block: 'hidden-sm'}
																			],
																			attrs: {
																				colspan: '2'
																			},
																			content: ''
																		},
																		{
																			elem: 'th',
																			content: 'Скидка'
																		},
																		{
																			elem: 'th',
																			content: 'Цена'
																		},
																		{
																			elem: 'th',
																			content: 'Кол-во'
																		},
																	]
																}
															]
														},
														{
															elem: 'tbody',
															content: [
																{
																	elem: 'tr',
																	content: [
																		{
																			elem: 'td',
																			mix: [
																				{block: 'hidden-xs'},
																				{block: 'hidden-sm'}
																			],
																			content: '1'
																		},
																		{
																			elem: 'td',
																			mix: [{block: 'text-left'}],
																			content: [
																				{
																					block: 'link',
																					content: 'Дрель-шуруповерт аккумуляторная HITACHI DS 12DVC'
																				}
																			]
																		},
																		{
																			elem: 'td',
																			content: '—'
																		},
																		{
																			elem: 'td',
																			content: '4 500 р'
																		},
																		{
																			elem: 'td',
																			content: '1 шт'
																		}
																	]
																},
																{
																	elem: 'tr',
																	content: [
																		{
																			elem: 'td',
																			mix: [
																				{block: 'hidden-xs'},
																				{block: 'hidden-sm'}
																			],
																			content: '1'
																		},
																		{
																			elem: 'td',
																			mix: [{block: 'text-left'}],
																			content: [
																				{
																					block: 'link',
																					content: 'Дрель-шуруповерт аккумуляторная HITACHI DS 12DVC'
																				}
																			]
																		},
																		{
																			elem: 'td',
																			content: '300 р'
																		},
																		{
																			elem: 'td',
																			content: '4 200 р'
																		},
																		{
																			elem: 'td',
																			content: '1 шт'
																		}
																	]
																},
															]
														},

														{
															elem: 'tfoot',
															content: [
																{
																	elem: 'tr',
																	mods: {noborder:true},
																	content: [
																		{
																			elem: 'td',
																			mix: [
																				{block: 'hidden-xs'},
																				{block: 'hidden-sm'}
																			],
																			mods: {colspan:true},
																		},
																		{
																			elem: 'td',
																			mix: [
																				{block: 'hidden-xs'},
																				{block: 'hidden-sm'}
																			],
																		},
																		{
																			elem: 'td',
																			mix: [{block: 'text-right'}],
																			content: '<span>Стоимость:</span>'
																		},
																		{
																			elem: 'td',
																			mods: {nowrap: true},
																			content: '7 700 р'
																		},
																		{
																			elem: 'td',
																			content: ''
																		},
																	]
																},
																{
																	elem: 'tr',
																	content: [
																		{
																			elem: 'td',
																			mods: {colspan:true},
																			mix: [
																				{block: 'hidden-xs'},
																				{block: 'hidden-sm'}
																			],
																		},
																		{
																			elem: 'td',
																			mix: [{block: 'text-left'}],
																			content: [
																				{
																					block: 'total-shipping',
																					content: [
																						{
																							elem: 'label',
																							content: 'Доставка:'
																						},
																						{
																							block: 'span',
																							content: 'Бесплатно'
																						},
																					]
																				}
																			]
																		},
																		{
																			elem: 'td',
																			mods: {total:true},
																			mix: [{block: 'text-right'}],
																			content: '<span>Итого:</span>'
																		},
																		{
																			elem: 'td',
																			mods: {total:true},
																			mods: {nowrap: true},
																			content: '7 700 р'
																		},
																		{
																			elem: 'td',
																			mix: [
																				{block: 'hidden-xs'},
																				{block: 'hidden-sm'}
																			],
																			content: ''
																		},
																	]
																}
															]
														}
													]
												},

											]
										},
										{
											block: 'info-contact',
											content: [
												{
													elem: 'data',
													content: [
														{
															elem: 'title',
															content: 'Контактные данные'
														},
														{
															elem: 'label',
															content: 'Получатель:'
														},
														{
															elem: 'value',
															content: 'Петров Иван Иваныч'
														},
														{
															elem: 'label',
															content: 'Контактный телефон:'
														},
														{
															elem: 'value',
															content: '+7 333 523-04-72'
														},
														{
															elem: 'label',
															content: 'E-mail:'
														},
														{
															elem: 'value',
															content: 'petrov@intervolga.ru'
														},
														{
															elem: 'label',
															content: 'Комментарии к заказу:'
														},
														{
															elem: 'value',
															content: ''
														},
														{
															elem: 'review',
															content: 'Предоставляется ли скидка для постоянных покупателей, или скидка по карте?'
														}
													]
												},
												{
													elem: 'methods',
													content: [
														{
															elem: 'title',
															content: 'Способ доставки'
														},
														{
															elem: 'strong',
															content: 'Самовывоз'
														},
														{
															elem: 'address-label',
															content: 'Адрес: '
														},
														{
															elem: 'address-value',
															content: 'г.УФА Новоженова, 88'
														},
														{
															elem: 'title',
															content: 'Способ доставки'
														},
														{
															elem: 'strong',
															content: 'Наличными в магазине'
														}
													]
												}
											]
										},
										{
											elem: 'footer',
											content: [
												{
													block: 'btn',
													mods: {link:true},
													content: 'В список заказов'
												},
												{
													block: 'btn',
													mix: [{block: 'pull-right'}],
													content: 'ОТМЕНИТЬ'
												}
											]
										}
									]
								},
							],
						},
						{
							elem: 'col',
							mods: {md: '3', sm: '4', 'md-pull': '9', 'sm-pull': '8'},
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
					]
				}
			]
		},
		require('../_common/footer.bemjson.js')
	]
};