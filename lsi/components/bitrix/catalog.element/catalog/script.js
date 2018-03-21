$(function(){
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('[data-height="equal"]').each(function() {
			var $this = $(this);
			$this.eqHeight('refresh')
		});
		$('[data-dotdotdot="true"]').dotdotdot();
	});

	$('#elementNavTabs').find('a.nav-tabs__link[data-set-url="' + window.location.pathname + '"]:first').click();

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		var $this = $(this);
		if($this.data('set-url') && $this.data('set-url') != window.location.pathname){
			history.pushState(null, null, $this.data('set-url'));
			if($this.data('set-title')){
				$('.title-page').html($this.data('set-title'));
			}
			if($this.data('set-meta-title')){
				document.title = $this.data('set-meta-title');
			}
		}
	});
});