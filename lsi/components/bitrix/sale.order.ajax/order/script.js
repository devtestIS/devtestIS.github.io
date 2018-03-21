BX.namespace('BX.Sale.OrderAjaxComponent');

(function () {
    'use strict';

    /**
     * Show empty default property value to multiple properties without default values
     */
    if (BX.Sale && BX.Sale.Input && BX.Sale.Input.Utils) {
        BX.Sale.Input.Utils.asMultiple = function (value) {
            if (value === undefined || value === null || value === '') {
                return [];
            }
            else if (value.constructor === Array) {
                var i = 0, length = value.length, val;

                for (; i < length;) {
                    val = value[i];

                    if (val === undefined || val === null || val === '') {
                        value.splice(i, 1);
                        --length;
                    }
                    else {
                        ++i;
                    }
                }

                return value.length ? value : [''];
            }
            else {
                return [value];
            }
        };
    }

    BX.Sale.OrderAjaxComponent = {
        BXFormPosting: false,
        regionBlockNotEmpty: false,
        locationsInitialized: false,
        locations: {},
        cleanLocations: {},
        locationsTemplate: '',
        pickUpMapInitialized: false,
        basketColumns: [],
        options: {},
        activeSectionId: '',
        firstLoad: true,
        initialized: {},
        mapsReady: false,
        maxWaitTimeExpired: false,
        lastSelectedDelivery: 0,
        deliveryLocationInfo: {},
        deliveryPagination: {},
        deliveryCachedInfo: [],
        paySystemPagination: {},
        validation: {},
        hasErrorSection: {},
        pickUpPagination: {},
        timeOut: {},
        isMobile: BX.browser.IsMobile(),
        isHttps: window.location.protocol == "https:",

        propPhoneIds: [],

        /**
         * Initialization of sale.order.ajax component js
         */
        init: function (parameters) {
            this.result = parameters.result || {};
            this.params = parameters.params || {};
            this.signedParamsString = parameters.signedParamsString || '';
            this.siteId = parameters.siteID || '';
            this.ajaxUrl = parameters.ajaxUrl || '';
            this.templateFolder = parameters.templateFolder || '';

            this.options.deliveriesPerPage = parseInt(parameters.params.DELIVERIES_PER_PAGE);
            this.options.paySystemsPerPage = parseInt(parameters.params.PAY_SYSTEMS_PER_PAGE);
            this.options.pickUpsPerPage = parseInt(parameters.params.PICKUPS_PER_PAGE);

            this.options.propertyValidation = !!parameters.propertyValidation;
            this.options.priceDiffWithLastTime = false;

            this.options.pickUpMap = parameters.pickUpMap;
            this.options.propertyMap = parameters.propertyMap;

            this.options.totalPriceChanged = false;


            this.initOptions();

            this.sendRequest();
        },

        /**
         * Send ajax request with order data and executes callback by action
         */
        sendRequest: function (action, actionData) {
            var self = this;

            var loaderTimer, form;
            if (!(loaderTimer = this.startLoader()))
                return;

            this.firstLoad = false;
            action = BX.type.isString(action) ? action : 'refreshOrderAjax';

            if (action == 'saveOrderAjax') {
                form = BX('bx-soa-order-form');
                if (form)
                    form.querySelector('input[type=hidden][name=sessid]').value = BX.bitrix_sessid();

                BX.ajax.submit(BX('bx-soa-order-form'), BX.proxy(this.saveOrder, this));
            }
            else {
                var requestData = this.getData(action, actionData);
                BX.ajax({
                    timeout: 60,
                    method: 'POST',
                    dataType: 'json',
                    url: this.ajaxUrl,
                    data: requestData,
                    onsuccess: BX.proxy(function (result) {
                        if (result.redirect && result.redirect.length)
                            document.location.href = result.redirect;
                        this.saveFiles();
                        switch (action) {
                            case 'refreshOrderAjax':
                            case 'showAuthForm':
                                this.refreshOrder(result);
                                break;
                        }
                        this.endLoader(loaderTimer);
                        if (requestData['order']['PERSON_TYPE'] != requestData['order']['PERSON_TYPE_OLD']) {
                            self.sendRequest(action, actionData);
                        }
                    }, this),
                    onfailure: BX.proxy(function () {
                        this.endLoader(loaderTimer);
                    }, this)
                });
            }
        },

        getData: function (action, actionData) {
            var data = {
                order: this.getAllFormData(),
                sessid: BX.bitrix_sessid(),
                via_ajax: 'Y',
                SITE_ID: this.siteId,
                action: action,
                signedParamsString: this.signedParamsString
            };

            if (action === 'enterCoupon' || action === 'removeCoupon')
                data.coupon = actionData;

            return data;
        },

        getAllFormData: function () {
            var form = BX('bx-soa-order-form'),
                prepared = BX.ajax.prepareForm(form),
                i;

            for (i in prepared.data)
                if (prepared.data.hasOwnProperty(i) && i == '')
                    delete prepared.data[i];

            return !!prepared && prepared.data ? prepared.data : {};
        },

        /**
         * Refreshes order via json data from ajax request
         */
        refreshOrder: function (result) {
            if (result.error) {
                this.showError(this.mainErrorsNode, result.error);
                this.animateScrollTo(this.mainErrorsNode, 800, 20);
            }
            else if (result.order.SHOW_AUTH) {
                var animation = this.result.OK_MESSAGE && this.result.OK_MESSAGE.length ? 'bx-step-good' : 'bx-step-bad';
                this.addAnimationEffect(this.authBlockNode, animation);
                BX.merge(this.result, result.order);
                this.editAuthBlock();
                this.showAuthBlock();
                this.showErrors(result.order.ERROR, false);
                this.animateScrollTo(this.authBlockNode);
            }
            else {
                this.isPriceChanged(result);

                //if (this.activeSectionId !== this.deliveryBlockNode.id)
                this.deliveryCachedInfo = [];

                this.result = result.order;
                this.locationsInitialized = false;
                this.maxWaitTimeExpired = false;
                this.pickUpMapInitialized = false;
                this.deliveryLocationInfo = {};
                this.initialized = {};

                this.initOptions();
                //this.editOrder();
                this.mapsReady && this.initMaps();
                BX.saleOrderAjax && BX.saleOrderAjax.initDeferredControl();

                updateOrderForm(result);
            }

            return true;
        },

        saveOrder: function (result) {
            var res = BX.parseJSON(result), redirected = false;
            if (res && res.order) {
                result = res.order;
                this.result.SHOW_AUTH = result.SHOW_AUTH;
                this.result.AUTH = result.AUTH;

                if (this.result.SHOW_AUTH) {
                    this.editAuthBlock();
                    this.showAuthBlock();
                    this.animateScrollTo(this.authBlockNode);
                }
                else {
                    if (result.REDIRECT_URL && result.REDIRECT_URL.length) {
                        redirected = true;
                        document.location.href = result.REDIRECT_URL;
                    }
                    this.showErrors(result.ERROR, true);
                }
            }

            if (!redirected)
                this.endLoader();
        },

        /**
         * Showing loader image with overlay.
         */
        startLoader: function () {
            if (this.BXFormPosting === true)
                return false;

            this.BXFormPosting = true;

            if (!this.loadingScreen) {
                this.loadingScreen = new BX.PopupWindow("loading_screen", null, {
                    overlay: {backgroundColor: 'white', opacity: '80'},
                    events: {
                        onAfterPopupShow: BX.proxy(function () {
                            BX.cleanNode(this.loadingScreen.popupContainer);
                            BX.removeClass(this.loadingScreen.popupContainer, 'popup-window');
                            this.loadingScreen.popupContainer.appendChild(
                                BX.create('IMG', {props: {src: this.templateFolder + "/images/loader.gif"}})
                            );
                            this.loadingScreen.popupContainer.removeAttribute('style');
                            this.loadingScreen.popupContainer.style.display = 'block';
                        }, this)
                    }
                });
                BX.addClass(this.loadingScreen.popupContainer, 'bx-step-opacity');
            }

            return setTimeout(BX.proxy(function () {
                this.loadingScreen.show()
            }, this), 100);
        },

        /**
         * Hiding loader image with overlay.
         */
        endLoader: function (loaderTimer) {
            this.BXFormPosting = false;

            if (this.loadingScreen && this.loadingScreen.isShown())
                this.loadingScreen.close();

            clearTimeout(loaderTimer);
        },

        saveFiles: function () {
            if (this.result.ORDER_PROP && this.result.ORDER_PROP.properties) {
                var props = this.result.ORDER_PROP.properties, i, prop;
                for (i = 0; i < props.length; i++) {
                    if (props[i].TYPE == 'FILE') {
                        prop = this.orderBlockNode.querySelector('div[data-property-id-row="' + props[i].ID + '"]');
                        if (prop)
                            this.savedFilesBlockNode.appendChild(prop);
                    }
                }
            }
        },

        /**
         * Animating scroll to certain node
         */
        animateScrollTo: function (node, duration, shiftToTop) {
            if (!node)
                return;

            var scrollTop = BX.GetWindowScrollPos().scrollTop,
                orderBlockPos = BX.pos(this.orderBlockNode),
                ghostTop = BX.pos(node).top - (this.isMobile ? 50 : 0);

            if (shiftToTop)
                ghostTop -= parseInt(shiftToTop);

            if (ghostTop + window.innerHeight > orderBlockPos.bottom)
                ghostTop = orderBlockPos.bottom - window.innerHeight + 17;

            new BX.easing({
                duration: duration || 800,
                start: {scroll: scrollTop},
                finish: {scroll: ghostTop},
                transition: BX.easing.makeEaseOut(BX.easing.transitions.quad),
                step: BX.delegate(function (state) {
                    window.scrollTo(0, state.scroll);
                }, this)
            }).animate();
        },

        checkKeyPress: function (event) {
            if (event.keyCode == 13) {
                var target = event.target || event.srcElement,
                    send = target.getAttribute('data-send'),
                    nextAttr, next;

                if (!send) {
                    nextAttr = target.getAttribute('data-next');
                    if (nextAttr) {
                        next = this.orderBlockNode.querySelector('input[name=' + nextAttr + ']');
                        next && next.focus();
                    }

                    return BX.PreventDefault(event);
                }
            }
        },


        /**
         * Returns status of preloaded data from back-end for certain block
         */
        checkPreload: function (node) {
            var status;

            switch (node.id) {
                case this.paySystemBlockNode.id:
                    status = this.result.LAST_ORDER_DATA && this.result.LAST_ORDER_DATA.PAY_SYSTEM;
                    break;
                case this.deliveryBlockNode.id:
                    status = this.result.LAST_ORDER_DATA && this.result.LAST_ORDER_DATA.DELIVERY;
                    break;
                case this.pickUpBlockNode.id:
                    status = this.result.LAST_ORDER_DATA && this.result.LAST_ORDER_DATA.PICK_UP;
                    break;
                default:
                    status = true;
            }

            return status;
        },

        initPropsListForLocation: function () {
            if (BX.saleOrderAjax && this.result.ORDER_PROP && this.result.ORDER_PROP.properties) {
                var i, k, curProp, attrObj;

                BX.saleOrderAjax.cleanUp();

                for (i = 0; i < this.result.ORDER_PROP.properties.length; i++) {
                    curProp = this.result.ORDER_PROP.properties[i];

                    if (curProp.TYPE == 'LOCATION' && curProp.MULTIPLE == 'Y' && curProp.IS_LOCATION != 'Y') {
                        for (k = 0; k < this.locations[curProp.ID].length; k++) {
                            BX.saleOrderAjax.addPropertyDesc({
                                id: curProp.ID + '_' + k,
                                attributes: {
                                    id: curProp.ID + '_' + k,
                                    type: curProp.TYPE,
                                    valueSource: curProp.SOURCE == 'DEFAULT' ? 'default' : 'form'
                                }
                            });
                        }
                    }
                    else {
                        attrObj = {
                            id: curProp.ID,
                            type: curProp.TYPE,
                            valueSource: curProp.SOURCE == 'DEFAULT' ? 'default' : 'form'
                        };

                        if (parseInt(curProp.INPUT_FIELD_LOCATION) > 0) {
                            attrObj.altLocationPropId = parseInt(curProp.INPUT_FIELD_LOCATION);
                            this.deliveryLocationInfo.city = curProp.INPUT_FIELD_LOCATION;
                        }

                        if (curProp.IS_LOCATION == 'Y')
                            this.deliveryLocationInfo.loc = curProp.ID;

                        if (curProp.IS_ZIP == 'Y') {
                            attrObj.isZip = true;
                            this.deliveryLocationInfo.zip = curProp.ID;
                        }

                        BX.saleOrderAjax.addPropertyDesc({
                            id: curProp.ID,
                            attributes: attrObj
                        });
                    }
                }
            }
        },


        initOptions: function () {
            var headers, i, total;

            this.initPropsListForLocation();

            if (this.options.propertyValidation)
                this.initValidation();

            if (this.result.GRID && this.result.GRID.HEADERS) {
                headers = this.result.GRID.HEADERS;
                for (i = 0; i < headers.length; i++) {
                    if (headers[i].id == 'PREVIEW_PICTURE')
                        this.options.showPreviewPicInBasket = true;

                    if (headers[i].id == 'DETAIL_PICTURE')
                        this.options.showDetailPicInBasket = true;

                    if (headers[i].id == 'PROPS')
                        this.options.showPropsInBasket = true;

                    if (headers[i].id == 'NOTES')
                        this.options.showPriceNotesInBasket = true;
                }
            }

            if (this.result.TOTAL) {
                total = this.result.TOTAL;
                this.options.showOrderWeight = total.ORDER_WEIGHT && parseFloat(total.ORDER_WEIGHT) > 0;
                this.options.showPriceWithoutDiscount = parseFloat(total.ORDER_PRICE) < parseFloat(total.PRICE_WITHOUT_DISCOUNT_VALUE);
                this.options.showDiscountPrice = total.DISCOUNT_PRICE && parseFloat(total.DISCOUNT_PRICE) > 0;
                this.options.showTaxList = total.TAX_LIST && total.TAX_LIST.length;
                this.options.showPayedFromInnerBudget = total.PAYED_FROM_ACCOUNT_FORMATED && total.PAYED_FROM_ACCOUNT_FORMATED.length;
            }
        },

        reachGoal: function (goal, section) {
            var counter = this.params.YM_GOALS_COUNTER || '',
                useGoals = this.params.USE_YM_GOALS == 'Y' && typeof window['yaCounter' + counter] !== 'undefined',
                goalId;

            if (useGoals) {
                goalId = this.getGoalId(goal, section);
                window['yaCounter' + counter].reachGoal(goalId);
            }
        },

        getGoalId: function (goal, section) {
            if (!goal)
                return '';

            if (goal == 'initialization')
                return this.params.YM_GOALS_INITIALIZE;

            if (goal == 'order')
                return this.params.YM_GOALS_SAVE_ORDER;

            var goalId = '',
                isEdit = goal == 'edit';

            if (!section || !section.id)
                return '';

            switch (section.id) {
                case this.basketBlockNode.id:
                    goalId = isEdit ? this.params.YM_GOALS_EDIT_BASKET : this.params.YM_GOALS_NEXT_BASKET;
                    break;
                case this.regionBlockNode.id:
                    goalId = isEdit ? this.params.YM_GOALS_EDIT_REGION : this.params.YM_GOALS_NEXT_REGION;
                    break;
                case this.paySystemBlockNode.id:
                    goalId = isEdit ? this.params.YM_GOALS_EDIT_PAY_SYSTEM : this.params.YM_GOALS_NEXT_PAY_SYSTEM;
                    break;
                case this.deliveryBlockNode.id:
                    goalId = isEdit ? this.params.YM_GOALS_EDIT_DELIVERY : this.params.YM_GOALS_NEXT_DELIVERY;
                    break;
                case this.pickUpBlockNode.id:
                    goalId = isEdit ? this.params.YM_GOALS_EDIT_PICKUP : this.params.YM_GOALS_NEXT_PICKUP;
                    break;
                case this.propsBlockNode.id:
                    goalId = isEdit ? this.params.YM_GOALS_EDIT_PROPERTIES : this.params.YM_GOALS_NEXT_PROPERTIES;
                    break;
            }

            return goalId;
        },

        isPriceChanged: function (result) {
            var priceBefore = this.result.TOTAL.ORDER_TOTAL_LEFT_TO_PAY === null || this.result.TOTAL.ORDER_TOTAL_LEFT_TO_PAY === ''
                    ? this.result.TOTAL.ORDER_TOTAL_PRICE
                    : this.result.TOTAL.ORDER_TOTAL_LEFT_TO_PAY,
                priceAfter = result.order.TOTAL.ORDER_TOTAL_LEFT_TO_PAY === null ? result.order.TOTAL.ORDER_TOTAL_PRICE : result.order.TOTAL.ORDER_TOTAL_LEFT_TO_PAY;

            this.options.totalPriceChanged = parseFloat(priceBefore) != parseFloat(priceAfter);
        },

        initValidation: function () {
            if (!this.result.ORDER_PROP || !this.result.ORDER_PROP.properties)
                return;

            var properties = this.result.ORDER_PROP.properties,
                obj = {}, i;

            for (i in properties) {
                if (properties.hasOwnProperty(i))
                    obj[properties[i].ID] = properties[i];
            }

            this.validation.properties = obj;
        },

        /**
         * Order saving action with validation. Doesn't send request while have errors
         */
        clickOrderSaveAction: function (event) {
            this.reachGoal('order');

            if (this.isValidForm())
                this.sendRequest('saveOrderAjax');

            $('#make_order').button('reset');

            return BX.PreventDefault(event);
        },

        isValidForm: function () {
            $('.has-error').removeClass('has-error');

            var form = $('#bx-soa-order-form');
            form.find('.has-error').removeClass('has-error');
            form.find('#errors').html('');
            var errors = [];
            form.find('input[type="text"]').each(function () {
                var input = $(this);
                if (input.hasClass('required') && !input.val()) {
                    $(this).parent().addClass('has-error');
                    errors.push('Не заполнено обязательное поле "' + input.attr('data-name') + '"');
                } else if (input.val() && input.attr('data-pattern')) {
                    var patternStr = input.attr('data-pattern');
                    patternStr = patternStr.replace(/^\//, '');
                    patternStr = patternStr.replace(/([^\\])\/([a-zA-Z])*$/, '$1');
                    var pattern = new RegExp(patternStr);
                    if (!pattern.test(input.val())) {
                        errors.push('Не корректное значение в поле "' + input.attr('data-name') + '"');
                    }
                }
            });
            if (errors.length) {
                form.find('#errors').html('<div class="alert alert-danger">' + errors.join('<br />') + '</div>');
            }

            return !errors.length;
        },

        showErrors: function (errors) {
            if (!errors || BX.util.object_keys(errors).length < 1)
                return;

            $('#errors').html('');
            var k;
            for (k in errors) {
                if (!errors.hasOwnProperty(k))
                    continue;

                var blockErrors = errors[k];
                $('#errors').html($('#errors').html() + '<div class="alert alert-danger">' + blockErrors.join('<br />') + '</div>');
            }
        }
    };
})();

var firstUpdate = true;
function updateOrderForm(data) {
    $('#make_order').button('loading');

    $('[name="PERSON_TYPE_OLD"]').val($('[name="PERSON_TYPE"]:checked').val());

    var contact_info = $('#order_form_contact_info');
    var html = '';
    BX.Sale.OrderAjaxComponent.propPhoneIds = [];
    for (var key in data.order.ORDER_PROP.properties) {
        var v = data.order.ORDER_PROP.properties[key].VALUE[0] ? data.order.ORDER_PROP.properties[key].VALUE[0] : data.order.ORDER_PROP.properties[key].DEFAULT_VALUE;
        if (data.order.ORDER_PROP.properties[key].CODE == 'DELIVERY_ADDRESS') {
            html += '<input type="hidden"' +
                ' name="ORDER_PROP_' + data.order.ORDER_PROP.properties[key].ID + '"' +
                ' value="' + v + '"' +
                ' data-change-local="THIS"' +
                ' />';
            $('[data-change-local="Y"][value="' + v + '"]').each(function () {
                var $this = $(this);
                $('[name="' + $this.attr('name') + '"]').prop('checked', false);
                $this.prop('checked', true);
                if ($this.attr('name') == 'DELIVERY_ADDRESS_1' && data.order.DELIVERY[2] && data.order.DELIVERY[2].CHECKED == "Y") { //самовывоз
                    $('[name="DELIVERY_ADDRESS_1"]:checked').click();
                }
            });
            continue;
        } else if (data.order.ORDER_PROP.properties[key].CODE == 'DELIVERY_ADDRESS_STRING') {
            $('#delivery_address_input input')
                .attr('name', 'ORDER_PROP_' + data.order.ORDER_PROP.properties[key].ID)
                .val(v);
            continue;
        }

        html += '<div class="checkout-line">';
        html += '<div class="checkout-line__label' + (data.order.ORDER_PROP.properties[key].REQUIRED == 'Y' ? ' required' : '') + '">' + data.order.ORDER_PROP.properties[key].NAME + '</div>';
        html += '<div class="checkout-line__input">';
        switch (data.order.ORDER_PROP.properties[key].TYPE) {
            case 'STRING':
                if (data.order.ORDER_PROP.properties[key].CODE == 'PHONE') {
                    var regex = /\+?(7|8)?([0-9]{10})/;
                    var m;
                    if ((m = regex.exec(v)) !== null) {
                        v = m[2];
                    }
                    BX.Sale.OrderAjaxComponent.propPhoneIds.push(data.order.ORDER_PROP.properties[key].ID);
                }
                html += '<input class="input form-control' + (data.order.ORDER_PROP.properties[key].REQUIRED == 'Y' ? ' required' : '')
                    + '" type="text"' +
                    ' name="ORDER_PROP_' + data.order.ORDER_PROP.properties[key].ID + '"' +
                    ' value="' + v + '"' +
                    ' placeholder="' + data.order.ORDER_PROP.properties[key].DESCRIPTION + '"' +
                    ' data-name="' + data.order.ORDER_PROP.properties[key].NAME + '"' +
                    ' data-pattern="' + data.order.ORDER_PROP.properties[key].PATTERN + '"/>';
                break;
        }
        html += '</div>';
        html += '</div>';
    }
    contact_info.html(html);
    for (var i = 0; i < BX.Sale.OrderAjaxComponent.propPhoneIds.length; i++) {
        var inputNameId = BX.Sale.OrderAjaxComponent.propPhoneIds[i];
        $('[name="ORDER_PROP_' + BX.Sale.OrderAjaxComponent.propPhoneIds[i] + '"]').inputmask("+7(999)999-99-99");
    }

    var order_form_delivery = $('#order_form_delivery');
    html = '';
    for (var key in data.order.DELIVERY) {
        var priceFormated = '';
        if (data.order.DELIVERY[key].PRICE >= 0
            && typeof(data.order.DELIVERY[key].DELIVERY_DISCOUNT_PRICE) != 'undefined') {
            priceFormated = data.order.DELIVERY[key].DELIVERY_DISCOUNT_PRICE > 0
                ? data.order.DELIVERY[key].DELIVERY_DISCOUNT_PRICE_FORMATED
                : (
                data.order.DELIVERY[key].DELIVERY_DISCOUNT_PRICE == 0
                    ? 'Бесплатно'
                    : (data.order.DELIVERY[key].DELIVERY_DISCOUNT_PRICE < 0
                        ? 'Рассчитывается менеджером'
                        : ''
                )
            );
        } else {
            priceFormated = data.order.DELIVERY[key].PRICE > 0
                ? data.order.DELIVERY[key].PRICE_FORMATED
                : (
                data.order.DELIVERY[key].PRICE == 0
                    ? 'Бесплатно'
                    : (data.order.DELIVERY[key].PRICE < 0
                        ? 'Рассчитывается менеджером'
                        : ''
                )
            );
        }
        if (priceFormated) {
            priceFormatedS = '(' + priceFormated + ')'
        }
        else {
            priceFormatedS = priceFormated
        }console.log(priceFormated);
        html += '<div class="radio radio_custom radio_inline">' +
            '<label>' +
            '<input class="radio__control" type="radio" name="DELIVERY_ID"' +
            ' value="' + data.order.DELIVERY[key].ID + '"' +
            (data.order.DELIVERY[key].CHECKED == 'Y' ? ' checked="checked"' : '') +
            '  />' +
            '<span class="radio__input"></span>' + data.order.DELIVERY[key].NAME +
            ' ' + priceFormatedS +
            '</label>' +
            '</div>';

        if (data.order.DELIVERY[key].CHECKED == 'Y') {
            $('#delivery_price').html(data.order.DELIVERY[key].NAME + ':<span>' + priceFormated + '</span>');

            if (data.order.DELIVERY[key].ID == 2 || data.order.DELIVERY[key].ID == 6) { //самовывоз
                var pickup = '';
                var first = true;
                if (typeof delivery_map == 'object' && delivery_map.geoObjects) {
                    delivery_map.geoObjects.removeAll();
                    for (var key in data.order.STORES_FOR_DELIVERY) {
                        pickup += '<div class="radio radio_custom">' +
                            '<label> ' +
                            '<input class="radio__control"' +
                            ' type="radio"' +
                            ' name="DELIVERY_ADDRESS_1"' +
                            ' value="' + data.order.STORES_FOR_DELIVERY[key]['CODE'] + '"' +
                            ' data-change-local="Y"' +
                            ' data-location-lat="' + data.order.STORES_FOR_DELIVERY[key]['LOCATION'][0] + '"' +
                            ' data-location-lon="' + data.order.STORES_FOR_DELIVERY[key]['LOCATION'][1] + '"' +
                            ' data-location-name="' + data.order.STORES_FOR_DELIVERY[key]['NAME'] + '" ' +
                            (first ? ' checked="checked"' : '') +
                            '/><span class="radio__input"></span>' + data.order.STORES_FOR_DELIVERY[key]['NAME'] + ' ' +
                            '</label> ' +
                            '</div>';
                        first = false;
                        if (!ymaps || ymaps.Placemark) {
                            continue;
                        }
                        try {
                            var store = new ymaps.Placemark(
                                [
                                    data.order.STORES_FOR_DELIVERY[key]['LOCATION'][0],
                                    data.order.STORES_FOR_DELIVERY[key]['LOCATION'][1]
                                ],
                                {
                                    hintContent: data.order.STORES_FOR_DELIVERY[key]['NAME']
                                }, {
                                    preset: 'islands#dotIcon',
                                    iconColor: '#f24841'
                                }
                            );
                            store.events.add(['click'], function (e) {
                                $this.click();
                            });
                            delivery_map.geoObjects.add(store);
                        } catch (e) {

                        }
                    }
                }
                $('#deliveryPickupList').html(pickup);

                $('#delivery_address_map').show();
                $('#delivery_address_input').hide();
                $('[name="DELIVERY_ADDRESS_1"]:checked').change();
            } else {
                $('#delivery_address_map').hide();
                $('#delivery_address_input').find('input').val('');
                $('#delivery_address_input').show();
            }
        }
    }
    order_form_delivery.html(html);

    var order_form_pay_system = $('#order_form_pay_system');
    html = '';
    for (var key in data.order.PAY_SYSTEM) {
        html += '<div class="radio radio_custom radio_inline">' +
            '<label>' +
            '<input class="radio__control" type="radio" name="PAY_SYSTEM_ID"' +
            ' value="' + data.order.PAY_SYSTEM[key].ID + '"' +
            (data.order.PAY_SYSTEM[key].CHECKED == 'Y' ? ' checked="checked"' : '') +
            ' />' +
            '<span class="radio__input"></span>' + data.order.PAY_SYSTEM[key].NAME +
            '</label>' +
            '</div>';
    }
    order_form_pay_system.html(html);

    var user_profiles = $('#order_form_profiles');
    if (data.order.USER_PROFILES) {
        user_profiles.show();
        $('#order_form_contact_info_collapse_link').show();
        var select_html = '<option value="">Новые данные</option>';
        $("#profile_change").val('N');
        for (var key in data.order.USER_PROFILES) {
            if (data.order.USER_PROFILES[key]['CHECKED'] == 'Y') {
                $("#profile_change").val('Y');
            }
            select_html += '<option value="' + data.order.USER_PROFILES[key]['ID'] + '"'
                + (data.order.USER_PROFILES[key]['CHECKED'] == 'Y' ? ' selected="selected"' : '') + '>'
                + data.order.USER_PROFILES[key]['NAME'] + ' (' + data.order.USER_PROFILES[key]['DATE_UPDATE'] + ')'
                + '</option>';
        }
        user_profiles.find('select').html(select_html).trigger("chosen:updated");
        $('#order_form_contact_info_collapse').collapse($("#profile_change").val() == 'Y' ? 'hide' : 'show');
    } else {
        user_profiles.hide();
        $('#order_form_contact_info_collapse_link').hide();
        $('#order_form_contact_info_collapse').collapse('show');
    }

    $('#make_order').button('reset');
    firstUpdate = false;
}

var delivery_map = null;
$(document).ready(function () {
    $('[data-change-local="Y"]').change(function () {
        $('[data-change-local="THIS"]').val($(this).val());
        var user_profiles_select = $('#order_form_profiles select');
        user_profiles_select.find('option').removeAttr('selected');
        user_profiles_select.find('option[value=""]').attr('selected', 'selected');
        user_profiles_select.trigger("chosen:updated");
        $("#profile_change").val('N');
    });

    $('#order_form_profiles select').change(function () {
        $("#profile_change").val($(this).val() ? 'Y' : 'N');
    });

    $('#bx-soa-order-form').on('change', 'input[name^="ORDER_PROP_"]', function () {
        var user_profiles_select = $('#order_form_profiles select');
        user_profiles_select.find('option').removeAttr('selected');
        user_profiles_select.find('option[value=""]').attr('selected', 'selected');
        user_profiles_select.trigger("chosen:updated");
        $("#profile_change").val('N');
    });

    $('#bx-soa-order-form').on('change', '[name="DELIVERY_ADDRESS_1"]', function () {
        var $this = $(this);
        if (delivery_map) {
            delivery_map.setCenter([$this.attr('data-location-lat'), $this.attr('data-location-lon')]);
        }
        $('[data-original-name="DELIVERY_ADDRESS_STRING"]').val($this.attr('data-location-name'));
    });

    $('#bx-soa-order-form').on('change', 'input[type="radio"][name!="DELIVERY_ADDRESS_1"],input[type="checkbox"],select', function () {
        BX.Sale.OrderAjaxComponent.sendRequest();
    });

    var isIOS = ((/iphone|ipad/gi).test(navigator.appVersion));
    $('#make_order').on(isIOS ? "touchstart" : "click", function (event) {
        var $this = $(this);
        $this.button('loading');
        BX.Sale.OrderAjaxComponent.clickOrderSaveAction(event);
    });

    $('[name="DELIVERY_ADDRESS_0"]').click(function () {
        var $this = $(this);
        if ($this.val()) {
            $('[name="DELIVERY_ADDRESS_1"][checked]').click();
        }
    });

    $('#order_form_contact_info_collapse').on('shown.bs.collapse', function () {
        $('a[href="#order_form_contact_info_collapse"][data-toggle]').html('Свернуть');
    });
    $('#order_form_contact_info_collapse').on('hidden.bs.collapse', function () {
        $('a[href="#order_form_contact_info_collapse"][data-toggle]').html('Развернуть');
    });

    if ($('#delivery_map').length) {
        ymaps.ready(function () {
            var radio = $('[name="DELIVERY_ADDRESS_1"]:first');

            delivery_map = new ymaps.Map('delivery_map', {
                center: [radio.attr('data-location-lat'), radio.attr('data-location-lon')],
                zoom: 16,
                controls: ['zoomControl', 'fullscreenControl']
            }, {
                searchControlProvider: 'yandex#search'
            });

            $('[name="DELIVERY_ADDRESS_1"]').each(function () {
                var $this = $(this);
                var store = new ymaps.Placemark([$this.attr('data-location-lat'), $this.attr('data-location-lon')], {
                    hintContent: $this.attr('data-location-name')
                }, {
                    preset: 'islands#dotIcon',
                    iconColor: '#f24841'
                });
                store.events.add(['click'], function (e) {
                    $this.click();
                });
                delivery_map.geoObjects.add(store);
            });
        });
    }
});