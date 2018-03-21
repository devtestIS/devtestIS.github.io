module.exports = {
	block: 'page',
	title: 'Печать магазина',
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
	scripts: [{elem: 'js', url: '../_merged/_merged.js'}, {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}, {elem: 'js', url: 'http://api-maps.yandex.ru/2.1/?lang=ru_RU'}],
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
							block: 'shop-detailed',
							content: [
								{
									elem: 'head',
									content: [
										{
											block: 'shop-detailed-head',
											mix: [{block: 'row'}],
											content: [
												{
													elem: 'col',
													mix: [{block: 'col-xs-4'}],
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
													mix: [{block: 'col-xs-4'}],
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
													mix: [{block: 'col-xs-4'}],
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
									block: 'img',
									url: 'print-map.jpg'
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
													mods: {xs: '3'},
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
													mods: {xs: '3'},
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
													mods: {xs: '3'},
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
													mods: {xs: '3'},
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

									
									]
								}
							]
						}

					]
				}
			]
		},

	]
};
