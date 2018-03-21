module.exports = {
	block: 'modal',
	mix: [{block: 'fade'}],
	attrs: {
		id: 'modal-write-a-review',
		tabindex: '-1'
	},
	mods: {theme:'light'},
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
							elem: 'close',
							attrs: {
								'data-dismiss': 'modal'
							},
							content: '<i class="fa fa-times" aria-hidden="true"></i>'
						},
						{
							elem: 'body',
							content: [
								{
									elem: 'title',
									content: 'Написать отзыв'
								},
								{
									block: 'form-horizontal',
									tag: 'form',
									content: [
										{
											block: 'form-group',
											mix: [{block: 'mbl'}],
											content: [
												{
													block: 'label-form',
													mix: [
														{block: 'col-sm-2'},
														{block: 'control-label'}
													],
													content: 'Ваше имя'
												},
												{
													block: 'col-sm-10',
													content: [
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
											block: 'form-group',
											mix: [{block: 'mvl'}],
											content: [
												{
													block: 'label-form',
													mix: [
														{block: 'col-sm-2'},
														{block: 'control-label'}
													],
													content: 'Отзыв'
												},
												{
													block: 'col-sm-10',
													content: [
														{
															block: 'textarea',
															rows: 6
														}
													]
												}
											]
										},
										{
											block: 'form-group',
											mix: [{block: 'mvl'}],
											content: [
												{
													block: 'label-form',
													mix: [
														{block: 'col-sm-2'},
														{block: 'control-label'}
													],
													content: 'Оценка'
												},
												{
													block: 'col-sm-10',
													content: [
														{
															block: 'star-rating',
															mods: {size: 'lg'},
														},
													]
												}
											]
										}


									]
								},

								{
									block: 'btn',
									mods: {color: 'primary', size: 'lg'},
									content: 'ОТПРАВИТЬ'
								}
							]
						},
					]
				}
			]
		}
	]
};