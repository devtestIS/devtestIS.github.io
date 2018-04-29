(function (cjs, an) {

var p; // shortcut to reference prototypes
var lib={};var ss={};var img={};
lib.ssMetadata = [];


// symbols:
// helper functions:

function mc_symbol_clone() {
	var clone = this._cloneProps(new this.constructor(this.mode, this.startPosition, this.loop));
	clone.gotoAndStop(this.currentFrame);
	clone.paused = this.paused;
	clone.framerate = this.framerate;
	return clone;
}

function getMCSymbolPrototype(symbol, nominalBounds, frameBounds) {
	var prototype = cjs.extend(symbol, cjs.MovieClip);
	prototype.clone = mc_symbol_clone;
	prototype.nominalBounds = nominalBounds;
	prototype.frameBounds = frameBounds;
	return prototype;
	}


(lib.Символ1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FF0000").ss(3,1,1).p("ABlA7IjJh1");
	this.shape.setTransform(263.2,51.8);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f().s("#FF0000").ss(3,1,1).p("AAmBjIhLjF");
	this.shape_1.setTransform(269.5,47.7);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f().s("#FF0000").ss(3,1,1).p("A7gJDQE4n3HGkxQHGkzHsglQIFgmHFEPQHtEmFaJu");
	this.shape_2.setTransform(-28.4,14.1,1.552,1,0,0,0,-18.3,14.1);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.Символ1, new cjs.Rectangle(-274.7,-59.3,549.5,118.8), null);


// stage content:
(lib.Безымянный1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		/* Постепенное появление фрагмента ролика
		Постепенно отображает экземпляр символа путем увеличения его свойства альфа-канала до максимума в событии Tick.
		
		Инструкции:
		1. Для изменения скорости появления экземпляра символа замените значение 0,01 в коде ниже (можно задать значение от 0,0 до 1,0). Чем больше значение, тем быстрее появится объект.
		2. Так как в анимации используется событие Tick, движение происходит только при переходе точки воспроизведения к следующему кадру. На скорость анимации также влияет частота кадров документа.
		*/
		
		var movieClip_1_FadeInCbk = fl_FadeSymbolIn.bind(this);
		this.addEventListener('tick', movieClip_1_FadeInCbk);
		this.movieClip_1.alpha = 0;
		
		function fl_FadeSymbolIn()
		{
			this.movieClip_1.alpha += 0.01;
			if(this.movieClip_1.alpha >= 1)
			{
				this.removeEventListener('tick', movieClip_1_FadeInCbk);
			}
		}
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(91));

	// Слой_1
	this.movieClip_1 = new lib.Символ1();
	this.movieClip_1.name = "movieClip_1";
	this.movieClip_1.parent = this;
	this.movieClip_1.setTransform(275.1,340.5);

	this.timeline.addTween(cjs.Tween.get(this.movieClip_1).wait(91));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(275.4,481.2,549.4,118.8);
// library properties:
lib.properties = {
	id: 'E4BD13842D0BED42AA9E1FFC6898EC8E',
	width: 550,
	height: 400,
	fps: 24,
	color: "#FFFFFF",
	opacity: 1.00,
	manifest: [],
	preloads: []
};



// bootstrap callback support:

(lib.Stage = function(canvas) {
	createjs.Stage.call(this, canvas);
}).prototype = p = new createjs.Stage();

p.setAutoPlay = function(autoPlay) {
	this.tickEnabled = autoPlay;
}
p.play = function() { this.tickEnabled = true; this.getChildAt(0).gotoAndPlay(this.getTimelinePosition()) }
p.stop = function(ms) { if(ms) this.seek(ms); this.tickEnabled = false; }
p.seek = function(ms) { this.tickEnabled = true; this.getChildAt(0).gotoAndStop(lib.properties.fps * ms / 1000); }
p.getDuration = function() { return this.getChildAt(0).totalFrames / lib.properties.fps * 1000; }

p.getTimelinePosition = function() { return this.getChildAt(0).currentFrame / lib.properties.fps * 1000; }

an.bootcompsLoaded = an.bootcompsLoaded || [];
if(!an.bootstrapListeners) {
	an.bootstrapListeners=[];
}

an.bootstrapCallback=function(fnCallback) {
	an.bootstrapListeners.push(fnCallback);
	if(an.bootcompsLoaded.length > 0) {
		for(var i=0; i<an.bootcompsLoaded.length; ++i) {
			fnCallback(an.bootcompsLoaded[i]);
		}
	}
};

an.compositions = an.compositions || {};
an.compositions['E4BD13842D0BED42AA9E1FFC6898EC8E'] = {
	getStage: function() { return exportRoot.getStage(); },
	getLibrary: function() { return lib; },
	getSpriteSheet: function() { return ss; },
	getImages: function() { return img; }
};

an.compositionLoaded = function(id) {
	an.bootcompsLoaded.push(id);
	for(var j=0; j<an.bootstrapListeners.length; j++) {
		an.bootstrapListeners[j](id);
	}
}

an.getComposition = function(id) {
	return an.compositions[id];
}



})(createjs = createjs||{}, AdobeAn = AdobeAn||{});
var createjs, AdobeAn;