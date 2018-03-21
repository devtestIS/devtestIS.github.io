window.garant = window.garant || {};

window.garant.ajaxPagination = {
    block: null,
    mutexes: {},
    prevPage: 0,
    nextPage: 2,
    pagesCount: 1,
    prevButton: null,
    nextButton: null,
    pagination: "",
    pagenName: "",
    sortPanel: "",
    nameTriggerAjax: "garantAjaxComplete",
    onDocumentReady: function () {
        garant.ajaxPagination.block = $("#MORE");
        $("[data-page-direction]").each(function () {
            var element = $(this);
            garant.ajaxPagination.initFieldsFromElement(element);

             if (element.data("page-direction") == "forward") {
                 garant.ajaxPagination.nextButton = element;
             }
             if (element.data("page-direction") == "backward") {
                 garant.ajaxPagination.prevButton = element;
             }
        });

        $("[data-page-direction='forward']").click(function () {
             garant.ajaxPagination.loadNextPage();
        });
        $("[data-page-direction='backward']").click(function () {
             garant.ajaxPagination.loadPrevPage();
         });
    },
    /**
     * @param {jQuery} element
     */
    initFieldsFromElement: function (element) {
        garant.ajaxPagination.pagesCount = element.data("max");
        var currentPage = parseInt(element.data("current"));
        garant.ajaxPagination.prevPage = currentPage - 1;
        garant.ajaxPagination.nextPage = currentPage + 1;
        garant.ajaxPagination.pagenName = element.data("get-name");
    },
    loadPrevPage: function () {
        if (garant.ajaxPagination.prevPage > 0) {
            var prevUrl = garant.ajaxPagination.getNumberPageUrl(garant.ajaxPagination.prevPage);
            if (!garant.ajaxPagination.isMutexBusy("prev")) {
                garant.ajaxPagination.setMutexBusy("prev");
                history.pushState(null, null, prevUrl);
                $.ajax({
                    url: prevUrl,
                    type: "GET",
                    dataType: "html"
                }).done(
                    garant.ajaxPagination.onPrevPageLoaded,
                    $(document).trigger(this.nameTriggerAjax)
                );
            }
        }
    },
    /**
     * @param {string} data
     */
    onPrevPageLoaded: function (data) {
        garant.ajaxPagination.pagination = $(data).find(".pagination").html();
        var response = $(data);
        garant.ajaxPagination.sortPanel = response.find('#sort-panel').html();
        garant.ajaxPagination.block.prepend(response.find("#MORE").html());
        garant.ajaxPagination.prevPage--;
        if (garant.ajaxPagination.prevPage == 0) {
            garant.ajaxPagination.prevButton.remove();
        }
        garant.ajaxPagination.onAfterPageInserted();
        garant.ajaxPagination.releaseMutex("prev");
    },
    onAfterPageInserted: function () {
        if (garant.ajaxPagination.pagination) {
            $(".pagination").html(garant.ajaxPagination.pagination);
            garant.ajaxPagination.pagination = "";
        }
        if (garant.ajaxPagination.sortPanel) {
            $('#sort-panel').html(garant.ajaxPagination.sortPanel);
            garant.ajaxPagination.sortPanel = "";
        }
        $(document).trigger(this.nameTriggerAjax);
    },
    loadNextPage: function () {
        if (garant.ajaxPagination.nextPage < (garant.ajaxPagination.pagesCount + 1)) {
            var nextUrl = garant.ajaxPagination.getNumberPageUrl(garant.ajaxPagination.nextPage);
            if (!garant.ajaxPagination.isMutexBusy("next")) {
                garant.ajaxPagination.setMutexBusy("next");
                history.pushState(null, null, nextUrl);
                $.ajax({
                    url: nextUrl,
                    type: "GET",
                    dataType: "html"
                }).done(garant.ajaxPagination.onNextPageLoaded);
            }
        }
    },
    /**
     * @param {string} data
     */
    onNextPageLoaded: function (data) {
        garant.ajaxPagination.pagination = $(data).find(".pagination").html();
        var response = $(data);
        garant.ajaxPagination.sortPanel = response.find('#sort-panel').html();
        garant.ajaxPagination.block.append(response.find("#MORE").html());
        garant.ajaxPagination.nextPage++;
        if (garant.ajaxPagination.nextPage > garant.ajaxPagination.pagesCount) {
            garant.ajaxPagination.nextButton.remove();
        }
        garant.ajaxPagination.onAfterPageInserted();
        garant.ajaxPagination.releaseMutex("next");
    },

    /**
     * @param number
     * @returns {string}
     */
    getNumberPageUrl: function (number) {
        var cleanUrl = garant.ajaxPagination.removeUrlPagenParameter(location.search);
        if (number == 1) {
            if (cleanUrl) {
                return cleanUrl;
            }
            else {
                return location.pathname;
            }
        }
        else {
            if (cleanUrl.indexOf("?") == -1) {
                return cleanUrl + "?" + garant.ajaxPagination.pagenName + "=" + number;
            }
            else {
                return cleanUrl + "&" + garant.ajaxPagination.pagenName + "=" + number;
            }
        }
    },
    /**
     * @returns {string}
     */
    removeUrlPagenParameter: function (url) {
        var prefix = encodeURIComponent(garant.ajaxPagination.pagenName) + '=';
        var baseUrl = url.substr(1);
        if (baseUrl.length) {
            var pars = url.substr(1).split(/[&;]/g);

            for (var i = pars.length; i-- > 0;) {
                if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                    pars.splice(i, 1);
                }
            }

            return (pars.length > 0 ? '?' + pars.join('&') : "");
        }
        return baseUrl;
    },
    /**
     * @param {string} mutex
     */
    releaseMutex: function (mutex) {
        garant.ajaxPagination.mutexes[mutex] = false;
    },
    /**
     * @param {string} mutex
     */
    setMutexBusy: function (mutex) {
        garant.ajaxPagination.mutexes[mutex] = true;
    },
    /**
     * @param {string} mutex
     * @returns {boolean}
     */
    isMutexBusy: function (mutex) {
        return garant.ajaxPagination.mutexes[mutex] == true;
    }
};