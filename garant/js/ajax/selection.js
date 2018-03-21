window.garant = window.garant || {};

window.garant.ajaxSelection = {
    category: null,
    categoryName: "",
    block: null,
    pagination: "",
    filterForm: "",
    sortPanel: "",
    stickyMore: "",
    pagenName: "PAGEN_1",
    onDocumentReady: function () {
        garant.ajaxSelection.block = $("#MORE");
        $("[data-category]").each(function () {
            var element = $(this);
            garant.ajaxSelection.initFieldsFromElement(element);

            element.click(function () {
                garant.ajaxSelection.loadCategoryElements($(this));

                var elements = $("[data-category]");
                for (var i = 0; i < elements.length; i++)
                {
                    $(elements[i]).removeClass('active');
                }

                $(this).addClass('active');
            });
        });
    },
    /**
     * @param {jQuery} element
     */
    initFieldsFromElement: function (element) {
        garant.ajaxSelection.categoryName = element.data("get-name");
    },
    loadCategoryElements: function (element) {
        var url = garant.ajaxSelection.getCategoryUrl(element.data("category"));
        history.pushState(null, null, url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html"
        }).done(
            garant.ajaxSelection.onCategoryLoaded
        );
    },
    /**
     * @param category
     * @returns {string}
     */
    getCategoryUrl: function (category) {
        var cleanUrl = garant.ajaxSelection.removeUrlCategoryParameter(location.search);

        if (cleanUrl.indexOf("?") == -1) {
            return cleanUrl + "?" + garant.ajaxSelection.categoryName + "=" + category;
        }
        else {
            return cleanUrl + "&" + garant.ajaxSelection.categoryName + "=" + category;
        }
    },
    /**
     * @returns {string}
     */
    removeUrlCategoryParameter: function (url) {
        var categoryPrefix = encodeURIComponent(garant.ajaxSelection.categoryName) + '=';
        var pagenPrefix = garant.ajaxSelection.pagenName + '=';
        var baseUrl = url.substr(1);

        if (baseUrl.length) {
            var pars = url.substr(1).split(/[&;]/g);

            for (var i = pars.length; i-- > 0;) {
                if (pars[i].lastIndexOf(categoryPrefix, 0) !== -1 || pars[i].lastIndexOf(pagenPrefix, 0) !== -1) {
                    pars.splice(i, 1);
                }
            }

            return (pars.length > 0 ? '?' + pars.join('&') : "");
        }
        return baseUrl;
    },
    /**
     * @param {string} data
     */
    onCategoryLoaded: function (data) {
        garant.ajaxSelection.pagination = $(data).find(".pagination").html();
        var response = $(data);
        garant.ajaxSelection.sortPanel = response.find('#sort-panel').html();
        garant.ajaxSelection.filterForm = response.find('#filter-form').html();
        garant.ajaxSelection.block = response.find("#MORE").html();
        garant.ajaxSelection.stickyMore = response.find("#stickyMore");
        garant.ajaxSelection.onAfterCategoryInserted();
    },
    onAfterCategoryInserted: function () {
        if (garant.ajaxSelection.pagination) {
            $(".pagination").html(garant.ajaxSelection.pagination);
            garant.ajaxSelection.pagination = "";
        }
        if (garant.ajaxSelection.sortPanel) {
            $('#sort-panel').html(garant.ajaxSelection.sortPanel);
            garant.ajaxSelection.sortPanel = "";
        }
        if (garant.ajaxSelection.filterForm) {
            $('#filter-form').html(garant.ajaxSelection.filterForm);
            garant.ajaxSelection.filterForm = "";
        }
        if (garant.ajaxSelection.block) {
            $('#MORE').html(garant.ajaxSelection.block);
            garant.ajaxSelection.block = "";
        }
        if (garant.ajaxSelection.stickyMore.length) {
            if ($('#stickyMore').length) {
                $('#stickyMore').remove();
            }

            $('#MORE').after(garant.ajaxSelection.stickyMore);
            garant.ajaxSelection.stickyMore = "";
        } else {
            $('#stickyMore').remove();
        }

        var event = document.createEvent("Event");
        event.initEvent("OnDocumentHtmlChanged", true, true);
        document.dispatchEvent(event);

        window.garant.ajaxPagination.onDocumentReady();
    },
};