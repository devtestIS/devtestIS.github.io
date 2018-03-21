$(document).ready(function () {
    var event = document.createEvent("Event");
    event.initEvent("OnDocumentHtmlChanged", true, true);
    document.dispatchEvent(event);
});
