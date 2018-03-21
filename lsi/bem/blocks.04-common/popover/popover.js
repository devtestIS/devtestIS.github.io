$(function () {
	var grid = window.iv.ui.getGridPoint();
	var $popover = $('[data-toggle="popover"]')
	if (grid === 'xs') {
		$popover.popover({
			container: 'body',
			placement: 'top'
		})
	} else {
		$popover.popover({
			container: 'body'
		})
	}

})