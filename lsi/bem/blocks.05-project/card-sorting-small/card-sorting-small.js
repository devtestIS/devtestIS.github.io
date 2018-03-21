$(function () {
    var $cardControlSmall = $('.card-control-small'),
        $toggle = $('.card-sorting-small__toggle'),
        $item = $('.card-sorting-small__li');

    $item.click(function () {
        var $this = $(this);
        $item.removeClass('card-sorting-small__li_active');
        $toggle.html($this.html())
        $this.addClass('card-sorting-small__li_active');
        var itemChange = $this.data('id');
        $cardControlSmall.trigger('card-control-change', itemChange)
    })
})