+function($){
    var Block = function(element, option){
        this.$block = null;
        this.$toggle = null;
        this.init(element, option);
    };

    Block.prototype.init = function(element, option){
        this.$block = $(element);
        this.$toggle = this.$block.find('.main-nav__toggle');
        $(document).on('click', $.proxy(this.toggle, this));

    };

    Block.prototype.toggle = function(e){
        var $this = $(e.target);
        if(!$this.closest(this.$block).length) this.$block.removeClass('open');
        if($this.closest(this.$toggle).length) this.$block.toggleClass('open');
    };

    function Plugin(option){
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('block.main_nav');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('block.main_nav', (data = new Block(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    $.fn.block_main_nav = Plugin;
    $.fn.block_main_nav.Constructor = Block;

    $('.main-nav').block_main_nav();
}(jQuery);
