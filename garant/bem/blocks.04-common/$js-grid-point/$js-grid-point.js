+function(){
    var Media = function(){
        this.grid = this.makeGrid();
    };
    Media.prototype.makeGrid = function(xs, sm, md, lg){
        var grid = {
            xs: { min: xs || 480 },
            sm: { min: sm || 768 },
            md: { min: md || 992 },
            lg: { min: lg || 1200}
        };
        grid.xs.max = grid.sm.min -1;
        grid.sm.max = grid.md.min -1;
        grid.md.max = grid.lg.min -1;

        return grid;
    };
    Media.prototype.getWidth = function(){
        if (!window.innerWidth) // workaround for missing window.innerWidth in IE8
            return document.documentElement.getBoundingClientRect().right - Math.abs(document.documentElement.getBoundingClientRect().left);
        return window.innerWidth;
    };
    Media.prototype.getHeight = function(){
        return window.innerHeight;
    };
    Media.prototype.getListener = function(){
        return {
            ex: window.matchMedia( "(max-width: "+this.grid.xs.min+"px)" ),
            xs: window.matchMedia( "(max-width: "+this.grid.xs.max+"px)" ),
            sm: window.matchMedia( "(min-width: "+this.grid.sm.min+"px) and (max-width: "+this.grid.sm.max+"px)" ),
            md: window.matchMedia( "(min-width: "+this.grid.md.min+"px) and (max-width: "+this.grid.md.max+"px)" ),
            lg: window.matchMedia( "(min-width: "+this.grid.lg.min+"px)" )
        }
    };
    Media.prototype.getKey = function(){
        var fullWindowWidth = this.getWidth();
        var key = 'ex';
        if(fullWindowWidth >= this.grid.xs.min)  key = 'xs';
        if(fullWindowWidth >= this.grid.sm.min)  key = 'sm';
        if(fullWindowWidth >= this.grid.md.min)  key = 'md';
        if(fullWindowWidth >= this.grid.lg.min)  key = 'lg';
        return key;
    };

    Media.prototype.getSizeForMedia = function(size){
        var size = {
            xs: (size / 100) * (this.grid.xs.min * 100) / this.grid.lg.min,
            sm: (size / 100) * (this.grid.sm.min * 100) / this.grid.lg.min,
            md: (size / 100) * (this.grid.md.min * 100) / this.grid.lg.min,
            lg: (size / 100) * 100
        };
        return size;
    };

    window.iv || (window.iv = {});
    window.iv.api || (window.iv.api = {});
    window.iv.api.media = new Media();


    /* Пример использования в плагине;
     var lister = window.iv.api.media.getListener();
     lister.xs.addListener(function(media){
     media.matches  && console.log('Вошел в xs');
     !media.matches && console.log('Вышел из xs');
     });
     lister.sm.addListener(function(media){
     media.matches  && console.log('Вошел в sm');
     !media.matches && console.log('Вышел из sm');
     });
     lister.md.addListener(function(media){
     media.matches  && console.log('Вошел в md');
     !media.matches && console.log('Вышел из md');
     });

     lister.lg.addListener(function(media){
     media.matches  && console.log('Вошел в lg');
     !media.matches && console.log('Вышел из lg');
     });
     */
}();
