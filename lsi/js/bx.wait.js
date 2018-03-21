BX._showWaitOld = BX.showWait;
BX.showWait = function(node, msg) {
	if(node === undefined){
		BX._showWaitOld(node, msg);
	}
};
BX._closeWaitOld = BX.closeWait;
BX.closeWait = function(node, msg) {
	if(node === undefined){
		BX._closeWaitOld(node, msg);
	}
};