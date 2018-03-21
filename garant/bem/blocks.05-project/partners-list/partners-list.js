+function($){
    var Block = function(element, option){
        this.$block = null;
        this.init(element, option);
    };

    Block.prototype.init = function(element, option){
        this.$block = $(element);
        this.$block.slick({
            arrows: true,
            dots: false,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 992-1,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    };


    function Plugin(option){
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('block.partners_slider');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('block.partners_slider', (data = new Block(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    $.fn.block_partners_slider = Plugin;
    $.fn.block_partners_slider.Constructor = Block;

    $('.partners-list').block_partners_slider();
}(jQuery);
