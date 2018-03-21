module.exports = {
	block: 'modal',
	mix: [{block: 'fade'}],
	attrs: {
		id: 'feedback',
		tabindex: '-1'
	},
	content: [
		{
			elem: 'dialog',
			mods: {size: 'md'},
			attrs: {
				role: "document"
			},
			content: [
				{
					elem: 'content',
					content: [
						{
							elem: 'header',
							content: [
								{
									elem: 'title',
									content: 'Обратный звонок'
								},
								{
									elem: 'close',
									attrs: {
										'data-dismiss': 'modal'
									},
									content: '<i class="fa fa-times" aria-hidden="true"></i>'
								},
							]
						},
						{
							elem: 'body',
							content: [
								{
									elem: 'compact',
									content: [
										{
											block: 'small',
											content: 'Заполните форму быстрого заказа, наши менеджеры скоро свяжутся с Вами.'
										},
										{
											block: 'form',
											tag: 'form',
											content: [
												{
													block: 'form-group',
													content: [
														{
															block: 'label-tag',
															content: 'Имя'
														},
														{
															block: 'input',
															mods: {control: true},
															type: 'text',
															attrs: {
																required: 'required'
															}
														}
													]
												},
												{
													block: 'form-group',
													content: [
														{
															block: 'label-tag',
															content: 'Телефон'
														},
														{
															block: 'input',
															mods: {control: true},
															type: 'text',
															attrs: {
																required: 'required'
															}
														}
													]
												}
											]

										},
										{
											block: 'row',
											content: [
												{
													elem: 'col',
													mods: {md: '9'},
													content: [
														{
															block: 'p',
															content: [
																{
																	block: 'sub',
																	tag: 'sub',
																	mix: [{block: 'text-danger'}],
																	content: '*'
																},
																' - обязательные поля'
															]
														}
													]
												}
											]
										},
									]
								},
							]
						},
						{
							elem: 'footer',
							content: [
								{
									elem: 'compact',
									content: [
										{
											block: 'btn',
											mods: {color: 'primary'},
											content: 'ОТПРАВИТЬ'
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
};