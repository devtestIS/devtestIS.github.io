window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.tableTitle = function () {

    var $table = $('.table_pseudo');
    if ($table.data('auto-title') !== true) return;
    var $th = $table.find('.table__th');
    $th.each(function (i, el) {
        var $thEl = $(el),
            thItem = i;
        var $tr = $table.find('.table__tbody .table__tr');
        var thTitle = $thEl.text();
        thTitle = thTitle.length ? thTitle + ': ' : thTitle;
        $tr.each(function (i, el) {
            var $trItem = $(el)
            var $td = $trItem.find('.table__td:eq(' + thItem + ')')
            $td.prepend('<span class="table__prepend">' + thTitle + '</span>');
        })
    })
}
$(function () {
    window.iv.ui.tableTitle();
})