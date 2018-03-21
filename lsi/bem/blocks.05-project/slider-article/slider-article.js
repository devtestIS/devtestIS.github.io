+function($){
    var Block = function(element, option){
        this.$block = null;
        this.option = {
            ex: null,
            xs: null,
            sm: null,
            md: null,
            lg: null
        };
        this.init(element, option);
    };

    Block.prototype.init = function(element, option){
        this.$block = $(element);
        this.option = {
            ex: this.$block.data('ex'),
            xs: this.$block.data('xs'),
            sm: this.$block.data('sm'),
            md: this.$block.data('md'),
            lg: this.$block.data('lg')
        };
        this.$block.slick({
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            // lg
            slidesToShow: this.option.lg,
            slidesToScroll: this.option.lg,
            responsive: [
                // md
                {
                    breakpoint: 1200-1,
                    settings: {
                        slidesToShow: this.option.md,
                        slidesToScroll: this.option.md
                    }
                },
                //sm
                {
                    breakpoint: 992-1,
                    settings: {
                        slidesToShow: this.option.sm,
                        slidesToScroll: this.option.sm
                    }
                },
                //xs
                {
                    breakpoint: 768-1,
                    settings: {
                        slidesToShow: this.option.xs,
                        slidesToScroll: this.option.xs
                    }
                },
                //ex
                {
                    breakpoint: 480-1,
                    settings: {
                        slidesToShow: this.option.ex,
                        slidesToScroll: this.option.ex
                    }
                }
            ]
        });
    };

    function Plugin(option){
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('block.slider_list');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('block.slider_list', (data = new Block(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    $.fn.block_slider_list = Plugin;
    $.fn.block_slider_list.Constructor = Block;

    $('.slider-article').block_slider_list();
}(jQuery);