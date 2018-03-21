(function (window) {

if (!!window.JCCatalogCompareList)
{
	return;
}

window.JCCatalogCompareList = function (params)
{
	this.obCompare = null;
	this.obAdminPanel = null;
	this.visual = params.VISUAL;
	this.visual.LIST = this.visual.ID + '_tbl';
	this.visual.ROW = this.visual.ID + '_row_';
	this.visual.COUNT = this.visual.ID + '_count';
	this.ajax = params.AJAX;
	this.position = params.POSITION;

	BX.ready(BX.proxy(this.init, this));
};

window.JCCatalogCompareList.prototype.init = function()
{
	this.obCompare = BX(this.visual.ID);
	if (!!this.obCompare)
	{
		BX.addCustomEvent(window, "OnCompareChange", BX.proxy(this.reload, this));
		BX.bindDelegate(this.obCompare, 'click', {tagName : 'a'}, BX.proxy(this.deleteCompare, this));
		if (this.position.fixed && this.position.align.vertical === 'top')
		{
			this.obAdminPanel = BX('bx-panel');
			if (!!this.obAdminPanel)
			{
				this.setVerticalAlign();
				BX.addCustomEvent(window, 'onTopPanelCollapse', BX.proxy(this.setVerticalAlign, this));
			}
		}
	}
};

window.JCCatalogCompareList.prototype.reload = function()
{
	BX.showWait(this.obCompare);
	BX.ajax.post(
		this.ajax.url,
		this.ajax.params,
		BX.proxy(this.reloadResult, this)
	);
};

window.JCCatalogCompareList.prototype.reloadResult = function(result)
{
	BX.closeWait();
	this.obCompare.innerHTML = result;
	BX.style(this.obCompare, 'display', 'block');
};

window.JCCatalogCompareList.prototype.deleteCompare = function()
{
	var target = BX.proxy_context,
		itemID,
		url;

	if (!!target && target.hasAttribute('data-id'))
	{
		itemID = parseInt(target.getAttribute('data-id'), 10);
		if (!isNaN(itemID))
		{
			BX.showWait(this.obCompare);
			url = this.ajax.url + this.ajax.templates.delete + itemID.toString();
			BX.ajax.loadJSON(
				url,
				this.ajax.params,
				BX.proxy(this.deleteCompareResult, this)
			);
		}
	}
};

window.JCCatalogCompareList.prototype.deleteCompareResult = function(result)
{
	var tbl,
		i,
		deleteID,
		cnt,
		newCount;

	BX.closeWait();
	if (typeof result === 'object')
	{
		if (!!result.STATUS && result.STATUS === 'OK' && !!result.ID)
		{
			tbl = BX(this.visual.LIST);
			if (tbl)
			{
				if (tbl.rows.length > 1)
				{
					deleteID = this.visual.ROW + result.ID;
					for (i = 0; i < tbl.rows.length; i++)
					{
						if (tbl.rows[i].id === deleteID)
						{
							tbl.deleteRow(i);
						}
					}
					tbl = null;
					if (!!result.COUNT)
					{
						newCount = parseInt(result.COUNT, 10);
						if (!isNaN(newCount))
						{
							cnt = BX(this.visual.COUNT);
							if (!!cnt)
							{
								cnt.innerHTML = newCount.toString();
								cnt = null;
							}
							BX.style(this.obCompare, 'display', (newCount > 0 ? 'block' : 'none'));
						}
					}
				}
				else
				{
					this.reload();
				}
			}
		}
	}
};

window.JCCatalogCompareList.prototype.setVerticalAlign = function()
{
	var topSize;
	if (!!this.obCompare && !!this.obAdminPanel)
	{
		topSize = parseInt(this.obAdminPanel.offsetHeight, 10);
		if (isNaN(topSize))
		{
			topSize = 0;
		}
		topSize +=5;
		BX.style(this.obCompare, 'top', topSize.toString()+'px');
	}
};

})(window);

var bx_compare = [];

function switchAdd2CompareButton(el, reloadList){
	if (reloadList === undefined) {
		reloadList = true;
	}
	console.log(el);
	var $this = $(el);
	$this.parent().find('.tooltip').remove();
	$this.addClass('disabled');
	var oldVal = null;
	if($this.attr('data-after-title')){
		oldVal = $this.html();
		$this.html($this.attr('data-after-title'));
		$this.attr('data-after-title', oldVal);
	}
	if($this.attr('data-after-tooltip')){
		oldVal = $this.attr('data-original-title');
		$this.attr('data-original-title', $this.attr('data-after-tooltip'));
		$this.attr('data-after-tooltip', oldVal);
	}
	if($this.attr('data-after-action')){
		oldVal = $this.attr('data-action');
		$this.attr('data-action', $this.attr('data-after-action'));
		$this.attr('data-after-action', oldVal);
	}
	if($this.attr('data-after-rel')){
		oldVal = $this.attr('data-rel');
		$this.attr('data-rel', $this.attr('data-after-rel'));
		$this.attr('data-after-rel', oldVal);
	}
	if($this.attr('data-after-class')){
		var _btn = $this.find('.btn__icon-comparison');
		var _class = $this.attr('data-after-class');
		if(_btn.hasClass(_class)){
			_btn.removeClass(_class);
		}else{
			_btn.addClass(_class);
		}
	}
	if($this.attr('data-after-text')){
		var _text = $this.find('.text');
		oldVal = _text.html();
		_text.html($this.attr('data-after-text'));
		$this.attr('data-after-text', oldVal);
	}
	$this
		.attr('href', '/personal/cart/');

	if(reloadList) {
		for (var i = 0; i < bx_compare.length; i++) {
			bx_compare[i].reload();
		}
	}
}

$(function(){
	$(document).on(
		'click',
		'[data-action="ADD2COMPARE"]',
		function(){
			var $this = $(this);
			if($this.attr('data-action')=='ADD2COMPARE' && $this.attr('data-rel')){
				$this.addClass('disabled');
				$.get(
					$this.attr('data-rel'),
					function(data){
						if(typeof data != 'object') {
							data = JSON.parse(data.replace(/'/g, '"'));
						}
						if(data && data['STATUS']=='OK'){
							$('[data-action="ADD2COMPARE"][data-rel$="' + $this.attr('data-rel') + '"]').each(function(){ switchAdd2CompareButton(this); });
							$this.blur().tooltip('show');
						}
						$this.removeClass('disabled');
					}
				);
			}
			return false;
		}
	);

	$(document).on(
		'click',
		'[data-action="REMOVE2COMPARE"]',
		function(){
			var $this = $(this);
			if($this.attr('data-action')=='REMOVE2COMPARE' && $this.attr('data-rel')){
				$this.addClass('disabled');
				$.get(
					$this.attr('data-rel'),
					function(data){
						if(typeof data != 'object') {
							data = JSON.parse(data.replace(/'/g, '"'));
						}
						if(data && data['STATUS']=='OK'){
							$('[data-action="REMOVE2COMPARE"][data-rel$="' + $this.attr('data-rel') + '"]').each(function(){ switchAdd2CompareButton(this); });
							$this.blur().tooltip('show');
						}
						$this.removeClass('disabled');
					}
				);
			}
			return false;
		}
	);

	$(document).on(
		'click',
		'[data-compare-remove]',
		function(){
			var $this = $(this);
			$this.closest(".teaser-product").addClass("fade");
			var url = $this.attr('data-compare-remove');
			$.get(
				url,
				function(data){
					if(typeof data != 'object') {
						data = JSON.parse(data.replace(/'/g, '"'));
					}
					if(data && data['STATUS']=='OK'){
						var rel = url.replace(/^.*(?=\/)/, "");
						$('[data-action="REMOVE2COMPARE"][data-rel$="'+rel+'"]').each(function(){ switchAdd2CompareButton(this); }).removeClass("disabled");
					}
				}
			);
			return false;
		}
	);
});