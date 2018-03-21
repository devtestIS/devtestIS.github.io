window.garant = window.garant || {};

$(document).ready(function () {
    window.garant.company.init();
    window.garant.companyoffer.init();
    window.garant.profile.init();
});

window.garant.company = {
    init: function () {
        var self = this;

        var acceptCompaniesLinks = $('[data-company-accept-id]');
        acceptCompaniesLinks.on("click", function (event) {
            if ($(event.target).length > 0) {
                var companyID = $(event.target).attr("data-company-accept-id");
                if (companyID)
                {
                    if (confirm('Вы действительно хотите принять эту компанию?'))
                    {
                        self.ajaxAcceptCompany(companyID);
                    }
                }
            }
        });
    },

    ajaxAcceptCompany: function (companyID) {
        $.ajax({
            url: "/ajax/company.php",
            data: {action: "accept", id: companyID}
        }).done(function (result) {
            // Если нужно распарсить ответ
            if (typeof result == "string") {
                try {
                    result = JSON.parse(result);
                }
                catch (e) {
                    // Если не получилось распарсить
                    alert(e.name);
                    console.log(e.message);
                }
            }
            console.log(result);
            if (result.STATUS == 'OK') {
                alert(result.MESSAGE);
                location.reload();
            }
            else {
                if (result.STATUS == 'ERROR') {
                    alert(result.ERRORS);
                    console.log(result.ERROR);
                }
            }
        });
    }
};

window.garant.companyoffer = {
    init: function () {
        var self = this;

        var acceptOffersLinks = $('[data-offer-accept-id]');
        acceptOffersLinks.on("click", function (event) {
            if ($(event.target).length > 0) {
                var offerID = $(event.target).attr("data-offer-accept-id");
                if (offerID)
                {
                    if (confirm('Вы действительно хотите принять это предложение?'))
                    {
                        self.ajaxAcceptCompanyOffer(offerID);
                    }
                }
            }
        });

        var removeOffersLinks = $('[data-offer-remove-id]');
        removeOffersLinks.on("click", function (event) {
            if ($(event.target).length > 0) {
                var offerID = $(event.target).attr("data-offer-remove-id");
                if (offerID)
                {
                    if (confirm('Вы действительно хотите удалить это предложение?'))
                    {
                        self.ajaxRemoveCompanyOffer(offerID);
                    }
                }
            }
        });
    },

    ajaxAcceptCompanyOffer: function (offerID) {
        $.ajax({
            url: "/ajax/offer.php",
            data: {action: "accept", id: offerID}
        }).done(function (result) {
            // Если нужно распарсить ответ
            if (typeof result == "string") {
                try {
                    result = JSON.parse(result);
                }
                catch (e) {
                    // Если не получилось распарсить
                    alert(e.name);
                    console.log(e.message);
                }
            }
            console.log(result);
            if (result.STATUS == 'OK') {
                alert(result.MESSAGE);
                location.reload();
            }
            else {
                if (result.STATUS == 'ERROR') {
                    alert(result.ERRORS);
                    console.log(result.ERROR);
                }
            }
        });
    },

    ajaxRemoveCompanyOffer: function (offerID) {
        $.ajax({
            url: "/ajax/offer.php",
            data: {action: "remove", id: offerID}
        }).done(function (result) {
            // Если нужно распарсить ответ
            if (typeof result == "string") {
                try {
                    result = JSON.parse(result);
                }
                catch (e) {
                    // Если не получилось распарсить
                    alert(e.name);
                    console.log(e.message);
                }
            }
            console.log(result);
            if (result.STATUS == 'OK') {
                alert(result.MESSAGE);
                location.reload();
            }
            else {
                if (result.STATUS == 'ERROR') {
                    alert(result.ERRORS);
                    console.log(result.ERROR);
                }
            }
        });
    }
};

window.garant.profile = {
    modal: null,
    changePasswordForm: null,
    changePasswordFormOkZone: null,
    changePasswordFormErrorZone: null,

    init: function () {
        var modal = $("#changePassword");
        if(modal.length > 0) {
            this.changePasswordForm = modal.find('form');
            var self = this;
            modal.on('hide.bs.modal', function () {
                self.changePasswordFormSubmitHideMessages();
            });
            this.modal = modal;
            this.changePasswordFormOkZone =  this.changePasswordForm.find('[data-ok]');
            this.changePasswordFormErrorZone =  this.changePasswordForm.find('[data-error]');
            this.changePasswordFormSubmitHandler()
        }
    },

    changePasswordFormSubmitHandler: function () {
        var self = this;
        this.changePasswordForm.on('submit', function(e){
            e.preventDefault();
            self.onChangePasswordFormSubmit(this);
        })
    },

    onChangePasswordFormSubmit: function (form) {
        this.changePasswordFormSubmitHideMessages();
        var self = this;
        $.ajax({
            method: "POST",
            url: "?axaj=true",
            data: $(form).serialize(),
            dataType: 'json'
        }).done(function (result) {
            console.log(result);
            if(result.STATUS === 'OK') {
                self.changePasswordFormOkZone.show();
                setTimeout(self.modal.modal('hide'), '1000');
            } else if(result.STATUS === 'ERROR') {
                self.changePasswordFormErrorZone.html(result.ERROR);
                self.changePasswordFormErrorZone.show();
            }
        });
    },

    changePasswordFormSubmitHideMessages: function () {
        this.changePasswordFormOkZone.hide();
        this.changePasswordFormErrorZone.hide();
    }
};