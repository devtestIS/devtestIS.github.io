window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.tableTitle = function () {
    var $table = $('.pseudo-table');
    if ($table.data('auto-title') !== true) return;
    var $th = $table.find('.pseudo-table__th');
    $th.each(function (i, el) {
        var $thEl = $(el),
            thItem = i;
        var $tr = $table.find('.pseudo-table__tbody .pseudo-table__tr');
        var thTitle = $thEl.text();
        thTitle = thTitle.length ? thTitle + ': ' : thTitle;
        $tr.each(function (i, el) {
            var $trItem = $(el)
            var $td = $trItem.find('.pseudo-table__td:eq(' + thItem + ')')
            $td.prepend('<span class="pseudo-table__prepend">' + thTitle + '</span>');
        })
    })
}
$(function () {
    window.iv.ui.tableTitle();
})