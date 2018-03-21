var searchIblockPopoverTimeout = null;
$(function () {
	var input = $('#titleSearchInput');
	input.inputPopover({'container': 'div.header-main-line__col.header-main-line__col_column_two'});
	input.keyup(function () {
		input.inputPopover('hide');
		clearTimeout(searchIblockPopoverTimeout);
		var val = $(this).val();
		if (val.length >= 3) {
			searchIblockPopoverTimeout = window.setTimeout(
				function(){
					$.ajax({
						url: "?ajaxRequest=Y",
						method: "POST",
						data: {
							'ajax' : 'search.iblock',
							'request' : val
						},
						success: function(data){
							if($.trim(data)) {
								$('#titleSearchInput').inputPopover('show', data);
							}
						}
					});
				},
				500
			);
		}
	});
});
