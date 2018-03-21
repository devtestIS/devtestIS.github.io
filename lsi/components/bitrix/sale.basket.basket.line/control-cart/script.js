'use strict';

function BitrixSmallCart(){}

BitrixSmallCart.prototype = {

	activate: function ()
	{
		this.cartElement = BX(this.cartId);
		this.fixedPosition = this.arParams.POSITION_FIXED == 'Y';
		if (this.fixedPosition)
		{
			this.cartClosed = true;
			this.maxHeight = false;
			this.itemRemoved = false;
			this.verticalPosition = this.arParams.POSITION_VERTICAL;
			this.horizontalPosition = this.arParams.POSITION_HORIZONTAL;
			this.topPanelElement = BX("bx-panel");

			this.fixAfterRender(); // TODO onready
			this.fixAfterRenderClosure = this.closure('fixAfterRender');

			var fixCartClosure = this.closure('fixCart');
			this.fixCartClosure = fixCartClosure;

			if (this.topPanelElement && this.verticalPosition == 'top')
				BX.addCustomEvent(window, 'onTopPanelCollapse', fixCartClosure);

			var resizeTimer = null;
			BX.bind(window, 'resize', function() {
				clearTimeout(resizeTimer);
				resizeTimer = setTimeout(fixCartClosure, 200);
			});
		}
		this.setCartBodyClosure = this.closure('setCartBody');
		BX.addCustomEvent(window, 'OnBasketChange', this.closure('refreshCart', {}));
	},

	fixAfterRender: function ()
	{
		this.statusElement = BX(this.cartId + 'status');
		if (this.statusElement)
		{
			if (this.cartClosed)
				this.statusElement.innerHTML = this.openMessage;
			else
				this.statusElement.innerHTML = this.closeMessage;
		}
		this.productsElement = BX(this.cartId + 'products');
		this.fixCart();
	},

	closure: function (fname, data)
	{
		var obj = this;
		return data
			? function(){obj[fname](data)}
			: function(arg1){obj[fname](arg1)};
	},

	toggleOpenCloseCart: function ()
	{
		if (this.cartClosed)
		{
			BX.removeClass(this.cartElement, 'bx-closed');
			BX.addClass(this.cartElement, 'bx-opener');
			this.statusElement.innerHTML = this.closeMessage;
			this.cartClosed = false;
			this.fixCart();
		}
		else // Opened
		{
			BX.addClass(this.cartElement, 'bx-closed');
			BX.removeClass(this.cartElement, 'bx-opener');
			BX.removeClass(this.cartElement, 'bx-max-height');
			this.statusElement.innerHTML = this.openMessage;
			this.cartClosed = true;
			var itemList = this.cartElement.querySelector("[data-role='basket-item-list']");
			if (itemList)
				itemList.style.top = "auto";
		}
		setTimeout(this.fixCartClosure, 100);
	},

	setVerticalCenter: function(windowHeight)
	{
		var top = windowHeight/2 - (this.cartElement.offsetHeight/2);
		if (top < 5)
			top = 5;
		this.cartElement.style.top = top + 'px';
	},

	fixCart: function()
	{
		// set horizontal center
		if (this.horizontalPosition == 'hcenter')
		{
			var windowWidth = 'innerWidth' in window
				? window.innerWidth
				: document.documentElement.offsetWidth;
			var left = windowWidth/2 - (this.cartElement.offsetWidth/2);
			if (left < 5)
				left = 5;
			this.cartElement.style.left = left + 'px';
		}

		var windowHeight = 'innerHeight' in window
			? window.innerHeight
			: document.documentElement.offsetHeight;

		// set vertical position
		switch (this.verticalPosition) {
			case 'top':
				if (this.topPanelElement)
					this.cartElement.style.top = this.topPanelElement.offsetHeight + 5 + 'px';
				break;
			case 'vcenter':
				this.setVerticalCenter(windowHeight);
				break;
		}

		// toggle max height
		if (this.productsElement)
		{
			var itemList = this.cartElement.querySelector("[data-role='basket-item-list']");
			if (this.cartClosed)
			{
				if (this.maxHeight)
				{
					BX.removeClass(this.cartElement, 'bx-max-height');
					if (itemList)
						itemList.style.top = "auto";
					this.maxHeight = false;
				}
			}
			else // Opened
			{
				if (this.maxHeight)
				{
					if (this.productsElement.scrollHeight == this.productsElement.clientHeight)
					{
						BX.removeClass(this.cartElement, 'bx-max-height');
						if (itemList)
							itemList.style.top = "auto";
						this.maxHeight = false;
					}
				}
				else
				{
					if (this.verticalPosition == 'top' || this.verticalPosition == 'vcenter')
					{
						if (this.cartElement.offsetTop + this.cartElement.offsetHeight >= windowHeight)
						{
							BX.addClass(this.cartElement, 'bx-max-height');
							if (itemList)
								itemList.style.top = 82+"px";
							this.maxHeight = true;
						}
					}
					else
					{
						if (this.cartElement.offsetHeight >= windowHeight)
						{
							BX.addClass(this.cartElement, 'bx-max-height');
							if (itemList)
								itemList.style.top = 82+"px";
							this.maxHeight = true;
						}
					}
				}
			}

			if (this.verticalPosition == 'vcenter')
				this.setVerticalCenter(windowHeight);
		}
	},

	refreshCart: function (data)
	{
		if (this.itemRemoved)
		{
			this.itemRemoved = false;
			return;
		}
		data.sessid = BX.bitrix_sessid();
		data.siteId = this.siteId;
		data.templateName = this.templateName;
		data.arParams = this.arParams;
		BX.ajax({
			url: this.ajaxPath,
			method: 'POST',
			dataType: 'html',
			data: data,
			onsuccess: this.setCartBodyClosure
		});
	},

	setCartBody: function (result)
	{
		if (this.cartElement)
			this.cartElement.innerHTML = result;
		if (this.fixedPosition)
			setTimeout(this.fixAfterRenderClosure, 100);
	},

	removeItemFromCart: function (id)
	{
		this.refreshCart ({sbblRemoveItemFromCart: id});
		this.itemRemoved = true;
		BX.onCustomEvent('OnBasketChange');
	}
};

var bx_basket = [];

function switchAdd2BasketButton(el, refreshCarts){
	if (refreshCarts === undefined) {
		refreshCarts = true;
	}
	var $this = $(el);
	if($this.attr("data-action") == "DEL")
	{
		$this.removeClass('btn-success').addClass('btn-primary');
		$this
			.attr('href', 'javascript:void(0);')
			.attr('data-action', "ADD2BASKET")
			.attr('data-no-mark', 'true');
	}
	else
	{
		$this.removeClass('btn-primary').addClass('btn-success');
		$this
			.attr('href', '/personal/cart/')
			.attr('data-action', "DEL");
	}
	var tooltipTemp = null;
	$this.parent().find('.tooltip').remove();
	if($this.attr('data-after-title')){
		tooltipTemp = $this.html();
		$this.html($this.attr('data-after-title'));
		$this.attr('data-after-title', tooltipTemp)
	}

	if($this.attr('data-after-tooltip')){
		tooltipTemp = $this.attr('data-original-title');
		$this.attr('data-original-title', $this.attr('data-after-tooltip'));
		$this.attr('data-after-tooltip', tooltipTemp);
	}

	if(refreshCarts) {
		for (var i = 0; i < bx_basket.length; i++) {
			bx_basket[i].refreshCart({});
		}
	}
}

$(function(){
	$(document).on(
		'click',
		'[data-action="ADD2BASKET"]',
		function(){
			var $this = $(this);
			if($this.attr('data-action')=='ADD2BASKET' && $this.attr('data-rel')){
				$this.addClass('disabled');
				$.get(
					$this.attr('data-rel'),
					function(data){
						if( typeof someVar === 'string' ) {
							data = JSON.parse(data.replace(/'/g, '"'));
						}
						if(data && data['STATUS']=='OK'){
							$('[data-action="ADD2BASKET"][data-rel$="' + $this.attr('data-rel') + '"]').each(function(){ switchAdd2BasketButton(this); });
							$this.blur().tooltip('show');
							var modAdded = $('#addedInBasket');
							if(modAdded.length > 0 && BX.getCookie('hideModalAddedInBasket') != 'true'){
								var modAddedElement = $('#addedInBasketElement');
								var title = $this.attr('data-element-title');
								var url = $this.attr('data-element-url');
								modAddedElement.html(
									url
										? '<a href="' + url + '">' + title + '</a>'
										: title
								);
								var modAddedContent = $('#addedInBasketContent');
								modAddedContent.html(
									'<div class="text-center mtl">' +
									'<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>' +
									'<span class="sr-only">Загрузка...</span>' +
									'</div>'
								);
								$('.tooltip').remove();
								modAdded.modal('show');
								$.post(
									'?ajax=Y',
									{
										action: 'getBuyWith',
										element: $this.attr('data-element')
									},
									function(result){
										modAddedContent.html(result);
										initAdd2Compare();
										initAdd2Basket();
										checkFavoriteStars();
										$('[data-height="equal"]').each(function() {
											$(this).eqHeight('refresh');
										});
										$('[data-dotdotdot="true"]').dotdotdot();
									}
								);
							}
						} else if(data && data['MESSAGE']) {
							viewModalError(data['MESSAGE']);
						} else {
							viewModalError('Возникли некоторые проблемы.<br />Попробуйте повторить операцию позже.');
						}
						$this.removeClass('disabled');
					}
				);
			}
			return false;
		}
	);

	$('input[name="hideModalAddedInBasket"]').change(function(){
		console.log($(this).prop('checked'));
		BX.setCookie(
			'hideModalAddedInBasket',
			$(this).prop('checked'),
			{expires: 3600, path: '/'}
		);
	});

	$(document).on(
		'click',
		'[data-basket-remove-url]',
		function(){
			var button = $(this);
			button.closest(".teaser-product").addClass("fade");
			var ID = button.data("id");
			var url = button.data("basket-remove-url");
			$.get(
				url,
				function(data){
					$("[data-element="+ID+"]").each(function () {
						switchAdd2BasketButton(this, false);
					});
					for (var i = 0; i < bx_basket.length; i++) {
						bx_basket[i].refreshCart({});
					}
					var delID = button.attr('data-del-id');
					var product = $('[data-item-id = "'+delID+'"]');
					if(product.length > 0)
					{
						product.remove();
						recalcBasketAjax({});
					}
				}
			);
		});
});
