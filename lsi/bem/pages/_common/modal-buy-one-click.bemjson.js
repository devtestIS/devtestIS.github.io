module.exports = {
	block: 'modal',
	mix: [{block: 'fade'}],
	attrs: {
		id: 'modal-buy-one-click',
		tabindex: '-1'
	},
	content: [
		{
			elem: 'dialog',
			mods: {size: 'lg'},
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
									content: 'Купить в один клик'
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
									block: 'row',
									content: [
										{
											elem: 'col',
											mods: {md: '6'},
											content: [
												{
													block: 'img-responsive',
													mix: [{block: 'center-block'}],
													url: 'products/img-1.jpg'
												}
											]
										},
										{
											elem: 'col',
											mods: {md: '6'},
											content: [
												{
													block: 'buy-one-click-modal',
													content: [
														{
															elem: 'title',
															content: ' Дрель безударная 2-скоростная BOSCH GBM 16-2RE'
														},
														{
															elem: 'info',
															content: 'Цена: <span>34 224 р</span>'
														},
														{
															elem: 'info',
															content: 'Количество: <span>1</span>'
														}
													]
												}
											]
										}
									]
								}
							]
						},
						{
							elem: 'footer',
							content: [
								{
									block: 'text-left',
									mix: [{block: 'mhl'}],
									content: [
										{
											block: 'small',
											content: 'Заполните форму быстрого заказа, наши менеджеры скоро свяжутся с Вами.'
										},
										{
											block: 'form',
											mix: [{block: 'mts'}],
											tag: 'form',
											content: [
												{
													block: 'row',
													content: [
														{
															elem: 'col',
															mods: {sm: '6'},
															content: [
																{
																	block: 'form-group',
																	content: [
																		{
																			block: 'label-tag',
																			content: 'Имя<sup class="text-danger">*</sup>'
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
															elem: 'col',
															mods: {sm: '6'},
															content: [
																{
																	block: 'form-group',
																	content: [
																		{
																			block: 'label-tag',
																			content: 'Телефон<sup class="text-danger">*</sup>'
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
										{
											block: 'text-right',
											content: [
												{
													block: 'btn',
													mods: {color: 'primary'},
													content: 'Отправить'
												}
											]
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
};