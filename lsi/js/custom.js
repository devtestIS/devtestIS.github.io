window.lsi = window.lsi || {};

$(document).ready(function () {
    if (lsi) {
        for (var key in lsi) {
            if (lsi[key].onDocumentReady) {
                lsi[key].onDocumentReady();
            }
        }
    }
});
