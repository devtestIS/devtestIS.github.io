window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};
window.iv.ui.contactsMap = window.iv.ui.contactsMap || {};

var PICK_POINT_CENTER = {
    LAT: 54.78603078,
    LNG: 56.06427050
}
var PICK_POINT_ADDRESS = {
    TITLE: 'улица Новоженова 88',
    LAT: 54.78603078,
    LNG: 56.06427050
}
window.iv.ui.contactsMapPrint = function () {

    if (typeof PICK_POINT_CENTER != "object") {
        return;
    }
    var self = this;

    ymaps.ready(function () {
        var mapLAT = PICK_POINT_CENTER.LAT,
            mapLNG = PICK_POINT_CENTER.LNG,
            addressTITLE = PICK_POINT_ADDRESS.TITLE,
            addressLAT = PICK_POINT_ADDRESS.LAT,
            addressLNG = PICK_POINT_ADDRESS.LNG;

        var myMap = new ymaps.Map('contacts-map-print', {
            center: [mapLAT, mapLNG],
            zoom: 14,
            controls: ['zoomControl']
        });

        var myPlacemark = new ymaps.Placemark([addressLAT, addressLNG], {
            hintContent: addressTITLE
        }, {
            preset: 'islands#redDotIcon'
        });

        myMap.geoObjects.add(myPlacemark);
        self.mapObject = myMap;
    });

};

$(function () {
    if ($("#contacts-map-print").length) {
        window.iv.ui.contactsMapPrint()
    }

    $('.contacts-map__mess').on('touchstart', function () {
        var $this = $(this),
            wrapMap = $this.closest('.contacts-map');

        var newText = $this.data('toggle-text');
        var oldText = $this.html();
        $this.html(newText);
        $this.data('toggle-text', oldText);

        wrapMap.toggleClass('contacts-map_touch-lock');

    })

});