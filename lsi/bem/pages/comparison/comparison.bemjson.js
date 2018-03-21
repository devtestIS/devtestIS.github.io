module.exports = {
	block: 'page',
	title: 'Сравнение товаров',
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
					content: 'Сранение товаров'
				},
				{
					block: 'equalizer',
					mix: [{block: 'hidden-sm'}, {block: 'hidden-xs'}],
					content: [
						{
							block: 'row',
							content: [
								{
									elem: 'col',
									mods: {md: '3', sm: '2'},
									mix: [{block: 'ptm'}],
									content: [
										{
											block: 'select',
											mods: {chosen: true, comparison: true},
											content: [
												'Дрели',
												'Бетономешалки',
												'Шлифмашины угловые (УШМ) электрические Шлифмашины угловые (УШМ) электрические',
												'Автомоечное и автосервисное оборудование'
											]
										},
										{
											block: 'comparison-list',
											content: [
												{
													elem: 'head',
													attrs:{
														'data-eq': true
													},
													content: [
														{
															elem: 'link',
															content: 'Все параметры'
														},
														{
															elem: 'link',
															mods: {active: true},
															content: 'Различающиеся'
														}
													]
												},
												{
													elem: 'item',
													attrs:{
														'data-eq': true
													},
													content: 'Цена'
												},
												{
													elem: 'item',
													attrs:{
														'data-eq': true
													},
													content: 'Потребляемая мощность (Вт) '
												},
												{
													elem: 'item',
													attrs:{
														'data-eq': true
													},
													content: 'Макс. число оборотов холостого хода (об/мин) '
												},
												{
													elem: 'item',
													attrs:{
														'data-eq': true
													},
													content: 'Ширина (мм)'
												},
												{
													elem: 'item',
													attrs:{
														'data-eq': true
													},
													content: 'Высота (мм)'
												},
												{
													elem: 'item',
													attrs:{
														'data-eq': true
													},
													content: 'Глубина (мм)'
												},
												{
													elem: 'item',
													attrs:{
														'data-eq': true
													},
													content: 'Вес (кг)'
												},
											]
										}
									]
								},
								{
									elem: 'col',
									mods: {md: '9', sm: '10'},
									content: [
										{
											block: 'slider-comparison',
											content: [
												{
													elem: 'item',
													img: 'comparison/img-1.jpg',
													option: true,
													title: 'Фильтр сетевой со встроенным стабилизатором Ресанта С 2000, чёрный, матовый, без заземления'
												},
												{
													elem: 'item',
													img: 'comparison/img-1.jpg',
													title: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
												},
												{
													elem: 'item',
													img: 'comparison/img-1.jpg',
													title: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
												},
												{
													elem: 'item',
													img: 'comparison/img-1.jpg',
													title: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
												},

											]
										},
									]
								}
							]
						}
					]
				},
				{
					block: 'comparison-small',
					content: [
						{
							block: 'comparison-small-list',
							content: [
								{
									block: 'select',
									mods: {control: true},
									mix: [{block: 'mbl'}],
									content: [
										'Дрели',
										'Бетономешалки',
										'Шлифмашины угловые (УШМ) электрические Шлифмашины угловые (УШМ) электрические',
										'Автомоечное и автосервисное оборудование'
									]
								},
								{
									elem: 'head',
									content: [
										{
											elem: 'link',
											content: 'Все параметры'
										},
										{
											elem: 'link',
											mods: {active: true},
											content: 'Различающиеся'
										}
									]
								},
							]
						},
						{
							block: 'comparison-small-item',
							img: 'comparison/img-1.jpg',
							content: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
						},
						{
							block: 'comparison-small-item',
							img: 'comparison/img-1.jpg',
							content: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
						},
						{
							block: 'comparison-small-list',
							content: [
								{
									elem: 'title',
									content: 'Потребляемая мощность (Вт)'
								},
								{
									elem: 'row',
									content: [
										{
											elem: 'name',
											content: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
										},
										{
											elem: 'value',
											content: [
												'800',
												{
													elem: 'remove',
													content: '×'
												}
											]
										},
									]
								},
								{
									elem: 'row',
									content: [
										{
											elem: 'name',
											content: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE'
										},
										{
											elem: 'value',
											content: [
												'780',
												{
													elem: 'remove',
													content: '×'
												}
											]
										},
									]
								},
								{
									elem: 'title',
									content: 'Макс. число оборотов  холостого хода (об/мин)'
								},
								{
									elem: 'row',
									content: [
										{
											elem: 'name',
											content: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
										},
										{
											elem: 'value',
											content: [
												'800',
												{
													elem: 'remove',
													content: '×'
												}
											]
										},
									]
								},
								{
									elem: 'row',
									content: [
										{
											elem: 'name',
											content: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE'
										},
										{
											elem: 'value',
											content: [
												'780',
												{
													elem: 'remove',
													content: '×'
												}
											]
										},
									]
								},
								{
									elem: 'title',
									content: 'Ширина (мм)'
								},
								{
									elem: 'row',
									content: [
										{
											elem: 'name',
											content: 'Дрель безударная 2-скоростная Bosch GBH 2-26 DRE'
										},
										{
											elem: 'value',
											content: [
												'800',
												{
													elem: 'remove',
													content: '×'
												}
											]
										},

									]
								},
								{
									elem: 'row',
									content: [
										{
											elem: 'name',
											content: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE'
										},
										{
											elem: 'value',
											content: [
												'780',
												{
													elem: 'remove',
													content: '×'
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
		require('../_common/footer.bemjson.js')
	]
};