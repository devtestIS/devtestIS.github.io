+function($){
    var Block = function(element, option){
        this.$block = null;
        this.touchstartX = 0;
        this.touchstartY = 0;
        this.touchendX = 0;
        this.touchendY = 0;

        this.init(element, option);
    };

    Block.prototype.init = function(element, option){
        this.$block.on('touchstart touchend', $.proxy(function(e){
            switch (e.type){
                case 'touchstart':
                    this.touchstartX = e.screenX;
                    this.touchstartY = e.screenY;
                    break;

                case 'touchend':
                    this.touchendX = e.screenX;
                    this.touchendY = e.screenY;

                    return this.handleGesure();
                    break;
            }
        }, this));
    };

    Block.prototype.handleGesure = function(){
        if (this.touchendX < this.touchstartX) {
            return 'left';
        }
        if (this.touchendX > this.touchstartX) {
            return 'right';
        }
        if (this.touchendY < this.touchstartY) {
            return 'down';
        }
        if (this.touchendY > this.touchstartY) {
            return 'top';
        }
        if (this.touchendY == this.touchstartY) {
            return 'tap';
        }
    };

    function Plugin(option){
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('block.touch');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('block.touch', (data = new Block(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    $.fn.block_touch = Plugin;
    $.fn.block_touch.Constructor = Block;

    $('.touch').block_touch();
}(jQuery);