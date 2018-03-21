window.lsi = window.lsi || {};
window.lsi.senderror = {
	modal_r: null,
	form: null,
	formContent: null,
	formErrors: null,
	formSuccess: null,
	formBtnOk: null,
	formBtnClose: null,
	btn: null,
	flagModalOpen: false,
	onDocumentReady: function () {
		this.initModal();
		this.keyPress();
		this.sendMail();
		this.onModalHide();
		this.buttonClick();
	},
	keyPress: function () {
		var isCtrl = false;
		var self = this;
		$(document).keyup(function (e) {
			if (e.which == 17) isCtrl = false;
		}).keydown(function (e) {
			if (e.which == 17) {
				isCtrl = true;
			}
			if (e.which == 13 && isCtrl == true) {
				e.preventDefault();
				self.onKeyPressed();
			}
		});
	},
	initModal: function () {
		if (!this.modal_r) {
			this.modal_r = $("#modalError");
			this.form = this.modal_r.find("form");
			this.formContent = this.modal_r.find("[data-content]");
			this.formErrors = this.modal_r.find("[data-error-zone]");
			this.formSuccess = this.modal_r.find("[data-success-zone]");
			this.formBtnClose = this.modal_r.find("[data-close]");
			this.formBtnOk = this.modal_r.find("[data-send]");
			this.btn = $("#send-button");
		}
	},
	onKeyPressed: function () {
		if(this.flagModalOpen) return;
		if (window.getSelection().rangeCount > 0) {
			this.formContent.text(
				window.getSelection()
					.getRangeAt(0)
					.cloneContents()
					.textContent.replace(/(\r|\t|\f|\v){2,}/g, ' ')
					.replace(/(\s\n){2,}/g, '\n').replace(/(\n){2,}/g, '\n')
			);
		}

		$(".modal").modal("hide");
		this.modal_r.modal("show");
		this.flagModalOpen = true;
	},
	sendMail: function () {
		var self = this;
		this.form.on("submit", function (event) {
			event.preventDefault();
			var url = self.form.find("[name='url']").val();
			var text = self.form.find("[name='text']").val();
			if (text.trim() != "") {
				self.makeAjax(url, text);
			}
			else {
				self.showError("Введите текст сообщения");
				self.formErrors.show();
			}
		})
	},
	makeAjax: function (url, text) {
		var new_url = url.replace("index.php", "");;
		new_url = window.location.protocol + "//" + window.location.hostname + new_url;
		console.log(new_url);
		var self = this;
		$.ajax({
			data: {
				"ITEM": {"UF_URL": new_url, "UF_TEXT": text},
				"action": "addError"
			},
			type: "POST",
			url: new_url
		}).done(function (data) {
			$result = JSON.parse(data);
			if ($result["RESULT"] == "OK") {
				self.showOk();
			}
			else {
				if(typeof($result["ERRORS"]) !=  'undefined'){
					self.showError("При отправке сообщения возникли ошибки");
				}
			}
		})
	},
	showError: function (error) {
		this.formErrors.text(error);
		this.formErrors.show();
	},
	showOk: function () {
		this.formContent.hide();
		this.modal_r.find("label").hide();
		this.formErrors.hide();
		this.formSuccess.show();
		this.formBtnOk.hide();
		this.formBtnClose.show();
	},
	onModalHide: function () {
		var self = this;
		this.modal_r.on("hidden.bs.modal", function () {
			self.formContent.text("");
			self.formErrors.hide();
			self.formSuccess.hide();
			self.formBtnOk.show();
			self.formBtnClose.hide();
			self.formContent.show();
			self.modal_r.find("label").show();
			self.flagModalOpen = false;
		})
	},
	buttonClick: function () {
		var self = this;
		this.btn.on("click", function () {
			self.onKeyPressed();
		})
	}
};