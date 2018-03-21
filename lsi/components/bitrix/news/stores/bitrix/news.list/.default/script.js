/**
 * @param {array} shopsMapAddresses адреса магазинов с названиями
 */
function initShopsMap(shopsMapAddresses) {
	ymaps.ready(function() {
		var mapLAT = PICK_POINT_CENTER.LAT,
			mapLNG = PICK_POINT_CENTER.LNG,
			addressTITLE = PICK_POINT_ADDRESS.TITLE,
			addressLAT = PICK_POINT_ADDRESS.LAT,
			addressLNG = PICK_POINT_ADDRESS.LNG;

		var myMap = new ymaps.Map('contacts-map-all', {
			center: [shopsMapAddresses[0]["LAT"], shopsMapAddresses[0]["LNG"]],
			zoom: 13,
			controls: ['zoomControl']
		});

		for (var i in shopsMapAddresses) {
			var myPlacemark = new ymaps.Placemark(
				[shopsMapAddresses[i]["LAT"], shopsMapAddresses[i]["LNG"]],
				{
					hintContent: shopsMapAddresses[i]["TITLE"]
				},
				{
					preset: 'islands#redDotIcon'
				}
			);
			myMap.geoObjects.add(myPlacemark);
		}

		var bounds = myMap.geoObjects.getBounds();
		myMap.setBounds(bounds);
		var oldZoom = myMap.getZoom();
		myMap.setZoom(oldZoom<14 ? oldZoom - 1 : 14);
	});
}
