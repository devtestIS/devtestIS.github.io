function City(){}
City.prototype = {
	currentXml: null,
	modal: null,
	ajaxurl: null,
	shopsDiv: null,
	citiesDiv: null,

	init: function (current, ajax) {
		this.currentXml = current;
		this.modal = $('#select-city');
		this.ajaxurl = ajax;
		this.actionChoose();
		this.actionAccept();
		var cookie = getCookie('LsiLocAccept');
		if(!cookie) {
			$('#CityButton').popover('destroy')
		} else {
			this.citiesDiv = $('[data-cities-top]');
			this.shopsDiv = $('[data-shops-top]');
			this.shopsDiv.hide();
			var newCookie = getCookie('LsiLoc');
			var newCityInput = this.modal.find('[data-city-xml="' + newCookie + '"]');
			newCityInput.attr('checked', '');
			this.citiesDiv.find('span').text(newCityInput.parent().text());
		}
	},

	actionChoose: function()
	{
		var self = this;
		this.modal.find('[data-ok]').on('click', function () {
			var input = $('[name="CITY"]:checked');
			$.ajax({
				method: "POST",
				url: self.ajaxurl + "/?ajaxRequest=Y",
				data: {
					'accept': true,
					'city_xml': input.attr('data-city-xml')
				},
				dataType: 'json'
			}).done(function (data) {
				if (input.attr('data-city-xml') !== self.currentXml) {
					window.location.href = input.val();
				}
				else {
					if(self.shopsDiv && self.citiesDiv) {
						self.shopsDiv.show();
						self.citiesDiv.find('span').text(input.parent().text());
					}
					self.modal.modal('hide');
				}
			})
		})
	},

	actionAccept: function () {
		var self = this;
		$('#YES_CITY').on('click', function () {
			var input = $('[name="CITY"]:checked');
			$.ajax({
				method: "POST",
				url: self.ajaxurl + "/?ajaxRequest=Y",
				data: {
					'accept': true,
					'city_xml': input.attr('data-city-xml')
				},
				dataType: 'json'
			}).done(function (data) {
				if (input.attr('data-city-xml') !== self.currentXml) {
					window.location.href = input.val();
				}
				else {
					self.shopsDiv.show();
				}
			})
		})
	}
};