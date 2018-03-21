window.lsi = window.lsi || {};
window.lsi.sort = {
    onDocumentReady: function ()
    {
        window.lsi.sort.onSortClick();
    },
    onSortClick: function ()
    {
        $("[data-sort-href]").on("click", function ()
        {
           var href = $(this).attr("data-sort-href");
            location.href = href;
            console.log(href);
        })
    }
};