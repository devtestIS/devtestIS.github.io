/**
 * Use this file to write javascript for your project.
 */
BX.addCustomEvent("onFrameDataReceived" , function() {
	//emitGlobalEvent("OnDocumentHtmlChanged");
});

/**
 * @param {string} eventName
 */
function emitGlobalEvent(eventName) {
	if (document['createEvent']) {
		var event = document.createEvent("Event");
		event.initEvent(eventName, true, true);
		document.dispatchEvent(event);
	}
}


$(document).ready(function () {
	init()
});

function init() {
	$('[data-toggle="popover"]').popover();
}
