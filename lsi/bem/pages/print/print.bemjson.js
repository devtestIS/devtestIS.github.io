module.exports = {
	block: 'page',
	title: 'Печать товара',
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
								{
									elem: 'id',
									content: 'Код товара: <strong>00000017082</strong>'
								}
							]
						},
						{
							block: 'product-detail',
							mix: [{block: 'shadow'}],
							content: [
								{
									elem: 'one',
									content: [
										{
											elem: 'label-line',
											content: [
												{
													block: 'star-rating',
													mods: {disabled: true, 'product-detail': true}
												},
												{
													elem: 'label',
													mods: {type: 'new'},
													content: 'Новинка'
												},
												{
													elem: 'label',
													mods: {type: 'action'},
													content: 'Акция'
												},
												{
													elem: 'label',
													mods: {type: 'our-choice'},
													content: 'Наш выбор'
												},
												{
													elem: 'label',
													mods: {type: 'guarantee'},
													content: 'Гарантия 1 год'
												}
											]
										},
										{
											block: 'img-responsive',
											url: 'product-slider/img-big-1.jpg'
										},
									]
								},
								{
									elem: 'border'
								},
								{
									elem: 'two',
									content: [
                                        {
                                            block: 'product-control',
                                            content: [
                                                {
                                                    elem: 'one',
                                                    content: [
                                                        {
                                                            elem: 'price',
                                                            mods: {new: true, big:true},
                                                            content: [
                                                                {content: '9 892 590 р'},
                                                                {
                                                                    elem: 'old-price',
                                                                    content: '40 253 р'
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
										{
											block: 'product-info',
											content: [
												{
													elem: 'title',
													mods: {icon: 'track'},
													content: 'Доставка курьером'
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'В течение дня (или завтра)'
														},
														{
															elem: 'value',
															content: '200 рублей'
														}
													]
												}

											]
										},
										{
											block: 'product-info',
											content: [
												{
													elem: 'title',
													mods: {icon: 'cart'},
													content: 'Самовывоз из магазинов Уфы БЕСПЛАТНО'
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: {
																block: 'a',
																content: 'Уфа, Новоженова, 88'
															}
														},
														{
															elem: 'value',
															mods: {available: true},
															content: 'В наличии'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: {
																block: 'a',
																content: 'Уфа, Менделеева, 134/4'
															}
														},
														{
															elem: 'value',
															mods: {available: 'none'},
															content: 'Через 10 дней <i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Товар в пути"></i>'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: {
																block: 'a',
																content: 'Уфа, Индустриальное шоссе, 7/1'
															}
														},
														{
															elem: 'value',
															mods: {available: true},
															content: 'В наличии'
														},
													]
												}
											]
										},
										{
											block: 'product-info',
											content: [
												{
													elem: 'title',
													mods: {icon: 'plane'},
													content: 'Доставка в другие регионы'
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Через 3-6 дней'
														},
														{
															elem: 'value',
															content: {
																elem: 'link',
																content: 'Подробнее о доставке'
															}
														}
													]
												}


											]
										},
										{
											block: 'product-info',
											content: [
												{
													elem: 'title',
													mods: {icon: 'cash'},
													content: 'Способы оплаты'
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Наличными'
														},
														{
															elem: 'value',
															content: {
																elem: 'link',
																content: 'Курьеру при доставке'
															}
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Наличными'
														},
														{
															elem: 'value',
															content: 'В магазинах на кассе'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Банковской картой'
														},
														{
															elem: 'value',
															content: 'В магазинах на кассе'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Банковской картой'
														},
														{
															elem: 'value',
															content: {
																elem: 'link',
																content: 'Курьеру при доставке'
															}
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Безналичным переводом неприлично длинный текст по всей длине'
														},
														{
															elem: 'value',
															content: {
																elem: 'link',
																content: 'Для юридических лиц длинный текст'
															}
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'В кредит'
														},
														{
															elem: 'value',
															content: {
																elem: 'link',
																content: 'Подробнее о кредите'
															}
														},
													]
												}


											]
										},
									]
								}
							]
						},
						{
							block: 'h2',
							mix: [{block: 'mvl'}],
							content: 'Описание'
						},
						{
							block: 'article',
							content: [

								'<p>Перфоратор DeWalt D25123K может применяться как в быту, так и на производстве. Он предназначен для создания отверстий в материалах любой плотности: дереве, бетоне, кирпиче, каменной кладке, керамике, металле пр. Это возможно благодаря трем режимам работы инструмента: сверление, сверление с долблением и долбление. Также предусмотрены блокировка вращения и отключение удара. Режим сверления следует использовать при работе по дереву, металлу, керамике, а также для работы с крепежом. Режим долбления потребуется при работе с кирпичом, бетоном, каменной кладкой или гранитом. </p>',
								'<p>Для комфортной эксплуатации, конструкция перфоратора DeWalt D25123K продумана до мелочей: прорезиненная основная ручка обеспечивает надежный хват, а дополнительная — поворачивается на 360 градусов. Система отвода воздуха защищает оператора от пыли. Оптимально сбалансированный корпус имеет эргономичную форму и максимально малый вес. </p>',
								'<p>Перфоратор DeWalt D25123K оснащен электронной системой регулировки скорости вращения бура, а встроенная предохранительная муфта оберегает оператора от травм, а инструмент от поломки в случае заклинивания.</p>'
							]
						},
						{
							block: 'h2',
							mix: [{block: 'mvl'}],
							content: 'Характеристики'
						},
						{
							block: 'row',
							content: [
								{
									elem: 'col',
									mods: {sm: '8'},
									content: [
										{
											block: 'product-info',
											mods: {print: true},
											content: [
												{
													elem: 'title',
													content: '<strong>Характеристики</strong>'
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Мощьность'
														},
														{
															elem: 'value',
															content: '1200 Вт'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Напряжение'
														},
														{
															elem: 'value',
															content: '200 В'
														},
													]
												},
												{
													elem: 'title',
													content: '<strong>Общие характеристики</strong>'
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Диаметр'
														},
														{
															elem: 'value',
															content: '20/25/32/40/50/63 мм'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Вес'
														},
														{
															elem: 'value',
															content: '2,5 Кг'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Мощьность'
														},
														{
															elem: 'value',
															content: '1 200 Вт'
														},
													]
												},
												{
													elem: 'row',
													content: [
														{
															elem: 'label',
															content: 'Температура нагрева'
														},
														{
															elem: 'value',
															content: '280 С'
														},
													]
												},
											]
										},
									]
								},
							]
						},
						{
							block: 'h2',
							mix: [{block: 'mvl'}],
							content: 'Сервисные центры'
						},
						{
							block: 'row',
							content: [
								{
									elem: 'col',
									mods: {
										sm: 8
									},
									content: [
										require('../_common/table-product-service.bemjson.js')
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
