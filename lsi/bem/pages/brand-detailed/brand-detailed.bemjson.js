module.exports = {
	block: 'page',
	title: 'Бренд Делатально',
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
					content: 'BOSCH'
				},
				{
					block: 'box-shadow',
					content: [
						{
							block: 'img-responsive',
							mix: [{block: 'pull-left'}, {block: 'mrl'}, {block: 'mbl'}],
							url: 'slider-brand/img-3.jpg'
						},
						'<p>Открытое акционерное общество Ярославский завод "Красный Маяк" является ведущим предприятием в России по разработке и производству электромеханических вибраторов. Вибраторы широко используются в промышленном, гражданском, дорожном, энергетическом строительстве, а также в машиностроении, металлургии, литейном производстве.</p>',
						'<p>В настоящее время предприятие выпускает вибраторы общепромышленного применения мощностью от 0.12 до 4 кВт, с частотой колебаний от 1000 до 6000 оборотов в минуту, вибраторы глубинные с гибким валом или со встроенным электродвигателем с диаметром рабочей части от 28 до 133 мм для ручной и механизированной проработки бетона. </p>',
						'<p>Изделия предприятия сертифицированы и поставляются во все регионы России и стран СНГ. C 2002 года система менеджмента качества сертифицирована на соответствие ISO 9001:2008.</p>'
					]
				}
			]
		},
		{
			block: 'line-container',
			content: [
				{
					block: 'container',
					content: [
						{
							block: 'sub-title',
							content: 'Оборудование бренда'
						},
						{
							block: 'row',
							content: [
								{
									elem: 'col',
									mods: {md: '3', sm: '6'},
									content: [
										{
											block: 'brand-link',
											content: 'Аппараты для сварки полипропиленовых труб'
										},
										{
											block: 'brand-link',
											content: 'Угловые шлифмашины (болгарки)'
										},
										{
											block: 'brand-link',
											content: 'Дрели'
										},
									]
								},
								{
									elem: 'col',
									mods: {md: '3', sm: '6'},
									content: [
										{
											block: 'brand-link',
											content: 'Система транспортировки и хранения'
										},
										{
											block: 'brand-link',
											content: 'Перфораторы'
										},
										{
											block: 'brand-link',
											content: 'Отбойные молотки'
										},
									]
								},
								{
									elem: 'col',
									mods: {md: '3', sm: '6'},
									content: [
										{
											block: 'brand-link',
											content: 'Миксеры'
										},
										{
											block: 'brand-link',
											content: 'Торцовочные пилы'
										},
										{
											block: 'brand-link',
											content: 'Пилы циркулярные'
										},
									]
								},
								{
									elem: 'col',
									mods: {md: '3', sm: '6'},
									content: [
										{
											block: 'brand-link',
											content: 'Рубанки'
										},
										{
											block: 'brand-link',
											content: 'Лобзики'
										},
										{
											block: 'brand-link',
											content: 'Многофункциональный инструмент'
										},
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