module.exports = {
	block: 'page',
	title: 'Заказы список',
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
									block: 'order-item',
									content: [
										{
											elem: 'head',
											content: [
												{
													elem: 'title',
													content: 'Закза <a href="#">№ 55</a> от 28.01.2016 15:32:44 на сумму 15 000 руб'
												},
												{
													elem: 'label',
													mods: {status: 'success'},
													content: 'Принят, ожидает подтверждения'
												},

											]
										},
										{
											elem: 'body',
											content: [
												{
													elem: 'row',
													content: [
														{
															elem: 'col',
															mods: {column: 'one'},
															content: '<strong>Оплата:</strong>'
														},
														{
															elem: 'col',
															mods: {column: 'two'},
															content: 'Оплата наличными курьеру <br>Не оплачен'
														},
														{
															elem: 'col',
															mods: {column: 'three'},
															content: '<strong>Доставка:</strong>'
														},
														{
															elem: 'col',
															mods: {column: 'four'},
															content: 'Доставка курьером'
														}
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'col',
															mods: {column: 'one'},
															content: '<strong>Состав:</strong>'
														},
														{
															elem: 'col',
															mods: {column: 'table'},
															content: [
																{
																	block: 'pseudo-table',
																	mods: {striped: 'even'},
																	mix: [{block: 'table-bordered'}],
																	content: [
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
																							content: '2'
																						},
																						{
																							elem: 'td',
																							mix: [{block: 'text-left'}],
																							content: [
																								{
																									block: 'link',
																									mix: [{block: 'order-item', elem: 'link'}],
																									content: 'Дрель-шуруповерт аккумуляторная (1АКБ) ВИХРЬ ДА-12-2'
																								}
																							]
																						},
																						{
																							elem: 'td',
																							content: '1 шт'
																						}
																					]
																				},
																			]
																		}

																	]
																}

															]
														}
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'col',
															mods: {column: 'more'},
															content: {
																block: 'a',
																content: 'Подробнее о заказе'
															},
														},
														{
															elem: 'col',
															mods: {column: 'group-control'},
															content: [
																{
																	block: 'btn',
																	mods: {color: 'primary'},
																	content: 'Повторить'
																},
																{
																	block: 'btn',
																	content: 'Отменить'
																},
															]
														}
													]
												}
											]
										}
									]
								},
								{
									block: 'order-item',
									content: [
										{
											elem: 'head',
											content: [
												{
													elem: 'title',
													content: 'Закза <a href="#">№ 55</a> от 28.01.2016 15:32:44 на сумму 15 000 руб'
												},
												{
													elem: 'label',
													mods: {status: 'warning'},
													content: 'Принят, ожидает подтверждения'
												},
											]
										},
										{
											elem: 'body',
											content: [
												{
													elem: 'row',
													content: [
														{
															elem: 'col',
															mods: {column: 'one'},
															content: '<strong>Оплата:</strong>'
														},
														{
															elem: 'col',
															mods: {column: 'two'},
															content: 'Оплата наличными курьеру <br>Не оплачен'
														},
														{
															elem: 'col',
															mods: {column: 'three'},
															content: '<strong>Доставка:</strong>'
														},
														{
															elem: 'col',
															mods: {column: 'four'},
															content: 'Доставка курьером'
														}
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'col',
															mods: {column: 'one'},
															content: '<strong>Состав:</strong>'
														},
														{
															elem: 'col',
															mods: {column: 'table'},
															content: [
																{
																	block: 'pseudo-table',
																	mods: {striped: 'even'},
																	mix: [{block: 'table-bordered'}],
																	content: [
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
																							content: '2'
																						},
																						{
																							elem: 'td',
																							mix: [{block: 'text-left'}],
																							content: [
																								{
																									block: 'link',
																									mix: [{block: 'order-item', elem: 'link'}],
																									content: 'Дрель-шуруповерт аккумуляторная (1АКБ) ВИХРЬ ДА-12-2'
																								}
																							]
																						},
																						{
																							elem: 'td',
																							content: '1 шт'
																						}
																					]
																				},
																			]
																		}

																	]
																}

															]
														}
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'col',
															mods: {column: 'more'},
															content: {
																block: 'a',
																content: 'Подробнее о заказе'
															},
														},
														{
															elem: 'col',
															mods: {column: 'group-control'},
															content: [
																{
																	block: 'btn',
																	mods: {color: 'primary'},
																	content: 'Повторить'
																},
																{
																	block: 'btn',
																	content: 'Отменить'
																},
															]
														}
													]
												}
											]
										}
									]
								},
							]
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