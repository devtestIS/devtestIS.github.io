+function($){
    var Block = function(element, option){
        this.$block = null;
        this.$up = null;
        this.$upText = null;
        this.scrollPosition = null;
        this.ticking = false;
        this.init(element, option);
    };

    Block.prototype.init = function(element, option){
        this.$body = $('body,html');
        this.$block = $(element);
        this.$up = this.$block.find('.main__up');
        this.$upText = this.$block.find('.main__up-text');

        this.$up.on('click', $.proxy(function (e) {
            this.ticking = true;
            this.$upText.css({
                'position': 'absolute'
            });
            this.$up.css({
                'visibility': 'visible',
                'opacity': 0
            });
            this.$body.animate({ scrollTop: 0 }, 0, $.proxy(function () {
                this.ticking = false;
                window.requestAnimationFrame($.proxy(function() {
                    this.onScroll(e);
                    this.ticking = false;
                }, this));
            }, this));
            e.preventDefault();
        }, this));

        $(window).on('resize scroll load', $.proxy(function (e) {
            var EventType = e.type;
            if(EventType == 'load'){
                this.$up.css({visibility: 'visible'})
            }
            if(EventType == 'scroll') this.scrollPosition = window.scrollY;
            if(EventType == 'resize' || EventType == 'load'){

            }
            if(!this.ticking){
                window.requestAnimationFrame($.proxy(function() {
                    this.onScroll(e);
                    this.ticking = false;
                }, this));
            }
            this.ticking = true;
        }, this));
    };

    Block.prototype.onScroll = function () {
        this.align = this.scrollPosition + window.innerHeight < this.$up.offset().top + this.$up.outerHeight();
        this.position = this.scrollPosition > this.$up.offset().top;
        this.opacity = this.scrollPosition > this.$up.offset().top + window.innerHeight / 2;
        this.$upText.css({
            'position': this.position && this.align ? 'fixed': 'absolute'
        });
        this.$up.css({
            'visibility': 'visible',
            'opacity': this.position && this.opacity ? 1 : 0
        })
    };

    function Plugin(option){
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('block.main');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('block.main', (data = new Block(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    $.fn.block_main = Plugin;
    $.fn.block_main.Constructor = Block;

    $('.main').block_main();
}(jQuery);