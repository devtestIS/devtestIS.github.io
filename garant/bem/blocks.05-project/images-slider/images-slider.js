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
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
                {
                    breakpoint: 992-1,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });
    };


    function Plugin(option){
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('block.images_slider');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('block.images_slider', (data = new Block(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    $.fn.block_images_slider = Plugin;
    $.fn.block_images_slider.Constructor = Block;

    $('.images-slider').block_images_slider();
}(jQuery);
