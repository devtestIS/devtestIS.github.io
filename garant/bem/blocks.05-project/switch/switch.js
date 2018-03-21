+function($){
    var Block = function(element, option){
        this.$block = null;
        this.$checkbox = null;
        this.$radio = null;
        this.init(element, option);
    };

    Block.prototype.init = function(element, option){
        this.$block = $(element);
        this.$checkbox = this.$block.find('[type="checkbox"]');
        this.$radio = this.$block.find('[type="radio"]');
        this.$checkbox.on('change', $.proxy(this.change, this));
    };
    Block.prototype.change = function(){
        if(!this.$radio.prop('checked')){
            this.$radio.prop('checked', true);
            this.$checkbox.prop('checked', !this.$checkbox.prop('checked'));
        }
    };

    function Plugin(option){
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('block.switch');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('block.switch', (data = new Block(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    $.fn.block_switch = Plugin;
    $.fn.block_switch.Constructor = Block;

    $('.switch').block_switch();
}(jQuery);
