module.exports = {
	block: 'page',
	title: 'Заказы детально, gtxfnm',
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

		{
			block: 'container',
			mix: [{block: 'mtl'}],
			content: [
				{
					block: 'print',
					content: [
						{
							block: 'clearfix',
							content: [
								{
									block: 'logo',
									mix: [
										{block: 'print', elem: 'logo'},
										{block: 'mtn'},
										{block: 'mrl'}
									],
									content: [
										{
											block: 'img-responsive',
											mix: [{block: 'logo', elem: 'img'}],
											url: 'logo.png'
										},
									]
								},
								{
									block: 'pr',
									mix: [{block: 'print', elem: 'phone'}],
									content: [
										{
											block: 'phone',
                                            mix: {block: 'ptn'},
											content: [
												{
													elem: 'num',
													content: '8 800 500 95 01'
												},
												{
													elem: 'label',
													content: 'звонок по России бесплатный'
												}
											]
										},
										{
											block: '1',
											content: 'График работы: 9:00-19:00'
										},
									]
								},

							]
						},
						{
							block: 'title-page',
                            mix: [{block: 'pull-left'}],
							content: 'Торсионный сверхпроводник: основные моменты'
						},
						{
							block: 'product-top-line',
							content: [
								{
									block: 'btn',
									url: 'javascript:(print());',
									mods: {color: false, print: true},
									mix: [{block: 'product-top-line', elem: 'btn'}],
									content: 'распечатать страницу'
								},
							]
						},
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
											block: 'table',
											mods: {striped: 'even', bordered: true},
											mix: [
												{block: 'order-detailed', elem: 'table', mods: {print: true}}
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
																	mods: {colspan:true},
																},
																{
																	elem: 'td',
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
									mods: {print: true},
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

									]
								}
							]
						},
					]
				},



			]
		},

	]
};