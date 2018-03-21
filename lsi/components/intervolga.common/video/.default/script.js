$(function () {
	$('.intervolga-video .play').click(function () {
		var $this = $(this),
			playerHolder = $this.parents('.intervolga-video'),
			data = playerHolder.data(),
			player = false;

		if (!data) {
			return;
		}

		if (data.provider === 'youtube') {
			var div = $('<div></div>').addClass('embed-responsive embed-responsive-16by9');
			player = $('<iframe/>', {
				src: data.src,
				class: 'embed-responsive-item'
			});
			div.html(player);
			playerHolder.replaceWith(div);

		} else if (data.provider === 'local') {
			jwplayer(playerHolder.attr('id')).setup({
				file: data.src,
				height: data.height,
				width: data.width,
				dock: true,
				autostart: true,
				players: [
					{type: "html5"},
					{type: "flash", src: "/bitrix/components/bitrix/player/mediaplayer/player"},
				],
				controlbar: 'over',
				'logo.hide': true,
				skin:'/bitrix/components/bitrix/player/mediaplayer/skins/bekle/bekle.zip'
			});
		}
	});
});
