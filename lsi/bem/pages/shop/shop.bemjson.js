module.exports = {
	block: 'page',
	title: 'Магазин детально',
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
	scripts: [{elem: 'js', url: '../_merged/_merged.js'}, {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}, {elem: 'js', url: 'http://api-maps.yandex.ru/2.1/?lang=ru_RU'}],
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
					block: 'shop-top-line',
					content: [
						{
							block: 'title-page',
							mods: {inner: true},
							content: 'Магазин "ЛидерСтройИнструмент" - Уфа - Новоженова 88 '
						},
						{
							block: 'btn',
							mods: {color:false, print:true},
							mix: [{block: 'shop-top-line', elem: 'btn'}],
							content: 'распечатать страницу'
						},
					]
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
											content: 'Уфа, Новоженова 88'
										},
										{
											elem: 'item',
											content: 'Уфа, Менделеева 134/4'
										},
										{
											elem: 'item',
											content: 'Уфа, Жукова 39/2'
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
									block: 'shop-detailed',
									content: [
										{
											elem: 'head',
											content: [
												{
													block: 'shop-detailed-head',
													content: [
														{
															elem: 'col',
															mods: {column: 'one'},
															content: [
																{
																	elem: 'title',
																	mods: {icon: 'address'},
																	content: 'Адрес'
																},
																{
																	elem: 'content',
																	content: 'Уфа, Новоженова 88'
																}
															]
														},
														{
															elem: 'col',
															mods: {column: 'two'},
															content: [
																{
																	elem: 'title',
																	mods: {icon: 'phone'},
																	content: 'Телефон'
																},
																{
																	elem: 'content',
																	content: '8 (347) 246-63-22'
																}
															]
														},
														{
															elem: 'col',
															mods: {column: 'three'},
															content: [
																{
																	elem: 'title',
																	mods: {icon: 'watch'},
																	content: 'Режим работы'
																},
																{
																	elem: 'content',
																	content: 'пн-суб: 9:00-19:00, <br/>вс: 9:00- 18:00'
																}
															]
														}
													]
												}
											]
										},
										{
											block: 'contacts-map',
											mods: {'touch-lock': true},
											attrs: {
												id: 'contacts-map',
												width: '100%',
												height: '290px'
											},
											content: [
												{
													elem: 'mess',
													attrs:{
														'data-toggle-text': 'Включить масштабирование/перемещение для карты <i class="fa fa-lock" aria-hidden="true"></i>'
													},
													content: 'Отключить масштабирование/перемещение для карты <i class="fa fa-unlock" aria-hidden="true"></i>'
												}
											]
										},
										{
											elem: 'info',
											content: [
												{
													block: 'row',
													mods: {'clean-lg': '4', 'clean-sm': '2'},
													content: [
														{
															elem: 'col',
															mods: {sm: '6', lg: '3'},
															content: [
																{
																	block: 'img-responsive',
																	url: 'contacts/img-1.png'
																},
																{
																	block: 'shop-detailed-info',
																	content: [
																		{
																			elem: 'title',
																			content: 'Способы покупки'
																		},
																		{
																			block: 'ul',
																			mods: {primary: true},
																			content: [
																				{
																					elem: 'li',
																					content: 'Приходите в магазин'
																				},
																				{
																					elem: 'li',
																					content: 'Сделайте заказ в интернет–магазине'
																				}
																			]
																		}
																	]
																}
															]
														},
														{
															elem: 'col',
															mods: {sm: '6', lg: '3'},
															content: [
																{
																	block: 'img-responsive',
																	url: 'contacts/img-2.png'
																},
																{
																	block: 'shop-detailed-info',
																	content: [
																		{
																			elem: 'title',
																			content: 'Способы оплаты'
																		},
																		{
																			block: 'ul',
																			mods: {primary: true},
																			content: [
																				{
																					elem: 'li',
																					content: 'Наличными — на кассе или курьеру'
																				},
																				{
																					elem: 'li',
																					content: 'Безналичный расчет'
																				},
																				{
																					elem: 'li',
																					content: 'Банковскими картами — на кассе'
																				},

																			]
																		}
																	]
																}
															]
														},
														{
															elem: 'col',
															mods: {sm: '6', lg: '3'},
															content: [
																{
																	block: 'img-responsive',
																	url: 'contacts/img-3.png'
																},
																{
																	block: 'shop-detailed-info',
																	content: [
																		{
																			elem: 'title',
																			content: 'Способы доставки'
																		},
																		{
																			block: 'ul',
																			mods: {primary: true},
																			content: [
																				{
																					elem: 'li',
																					content: 'Самовывоз — приходите в магазин, покупаете, забираете'
																				},
																				{
																					elem: 'li',
																					content: 'Курьерская доставка — привезем до ваших дверей'
																				}
																			]
																		}
																	]
																}
															]
														},
														{
															elem: 'col',
															mods: {sm: '6', lg: '3'},
															content: [
																{
																	block: 'img-responsive',
																	url: 'contacts/img-4.png'
																},
																{
																	block: 'shop-detailed-info',
																	content: [
																		{
																			elem: 'title',
																			content: 'Кредиты'
																		},
																		{
																			block: 'ul',
																			mods: {primary: true},
																			content: [
																				{
																					elem: 'li',
																					content: 'ПромТрансБанк'
																				},
																			]
																		}
																	]
																}
															]
														},
													]
												}
											]
										},
										{
											elem: 'content',
											content: [
												{
													block: 'h2',
													content: 'Как проехать в магазин ЛидерСтройИнструмент на Новоженова 88'
												},
												'<p>Наш магазин расположен по адресу Новоженова 88 напротив здания АвтоДом “Тан” на территории Спичечной фабрики. Если Вы будете ехать на автомобиле со стороны Проспекта Октября, нужно доехать до кинотеатра “Смена”, спуститься по улице Уфимское шоссе до перекрестка улиц Новоженова и Уфимское шоссе и повернуть направо в сторону улицы Жукова. Через 400 метров после 3-х ж/д путей располагается наш магазин. </p>',
												'<p>Если вы поедете к нам на общественном транспорте, есть несколько вариантов: 1) со стороны ул. Жукова нужно доехать до остановки "Новоженова" (маршруты 110с, 255а, 207, 210), и идти наверх по ул.Новоженова; 2) со стороны ул. Уфимское Шоссе нужно доехать до остановки "ТСК Импульс" (маршруты 27, 25с, 209, 229, 288) и идти вниз по ул. Новоженова.</p>',
												'<p>Ориентиры: АвтоДом “Тан” , Спичечная фабрика, Уфахимчистка, ост. "Новоженова", ост. "ТСК Импульс".;</p>',
												{
													block: 'h2',
													mix: [{block: 'shop-detailed', elem: 'title-slider'}],
													content: 'Фото магазина'
												},
												{
													block: 'slider-shop',
													content: [
														{
															elem: 'item',
															content: 'slider-shop/img-1.jpg'
														},
														{
															elem: 'item',
															content: 'slider-shop/img-2.jpg'
														},
														{
															elem: 'item',
															content: 'slider-shop/img-3.jpg'
														},
														{
															elem: 'item',
															content: 'slider-shop/img-1.jpg'
														},
														{
															elem: 'item',
															content: 'slider-shop/img-3.jpg'
														},
														{
															elem: 'item',
															content: 'slider-shop/img-2.jpg'
														}
													]
												}
											]
										}
									]
								}
							]
						}
					]
				}
			]
		},
		require('../_common/footer.bemjson.js')
	]
};