$(function () {
    var $btn = $('[data-text]');

    $btn.click(function () {
        var $this = $(this);
        var newText = $this.data('text');
        $this.data('text', $this.html())
        $this.html(newText);
    })

})