window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

/**
 * example
 * @param callContext
 * @param method
 * @param target
 */
// function ajaxPopoverSmartFilter(callContext, method, target) {
// 	var count = Math.floor(Math.random() * (100 - 0 + 1)) + 0;
// 	count = '(' + count + ')';
// 	method.call(callContext, target, count);
// }
window.iv.ui.smartFilterTooltip = {
	_dom: {},
	_flag: {
		shownPopover: true
	},
	_varDynamic: {
		template: '',
		isPopover: null
	},
	init: function () {
		this._dom = {
			filterBlock: $('.smart-filter__block'),
			smartFilter: $('.smart-filter'),
			popover: $('.smart-filter__popover'),
			inputFilter: $('.smart-filter__block input'),
			sliderFilter: $('.filter-slider__slider')
		};
		var self = this;

		this._varDynamic.isPopover = this._dom.smartFilter.append(this._varDynamic.template);


		self._dom.inputFilter.on('change', function (e) {
			if (typeof ajaxPopoverSmartFilter === 'function') {
				ajaxPopoverSmartFilter(window.iv.ui.smartFilterTooltip, window.iv.ui.smartFilterTooltip.popover, e.target);
			} else {
				self.popover(e.target);
			}

		});
		self._dom.sliderFilter.on("slidechange", function (e, ui) {
			if (typeof ajaxPopoverSmartFilter === 'function') {
				ajaxPopoverSmartFilter(window.iv.ui.smartFilterTooltip, window.iv.ui.smartFilterTooltip.popover, e.target);
			} else {
				self.popover(e.target);
			}
		});
		var touchClick = window.iv.ui.touchClick();
		$(document).on(touchClick, function (e) {
			if (window.iv.ui.getGridPoint() === 'xs') return;
			if (self._flag.shownPopover === false) return;
			if (!self._dom.smartFilter.is(e.target)
				&& self._dom.smartFilter.has(e.target).length === 0
				&& !self._dom.smartFilter.is(e.target)) {
				self._dom.popover.hide();
			}
		})

	},

	popover: function (el, count) {
		var self = this;
		var $el = $(el),
			offsetEl = $el.offset().top,
			offsetWrap = self._dom.smartFilter.offset().top,
			heightEl = $el.outerHeight(),
			positionPopover = offsetEl - offsetWrap - heightEl;

		if (typeof count === 'undefined') {
			self._dom.popover.css({'top': positionPopover, 'left': '100%'});
			self._dom.popover.show();
			self._flag.shownPopover = true;
		} else {
			var textCount = self._dom.popover.find('.smart-filter__count');
			textCount.text(count);
			self._dom.popover.css({'top': positionPopover, 'left': '100%'});
			self._dom.popover.show();
			self._flag.shownPopover = true;
		}


	}
};
$(function () {
	window.iv.ui.smartFilterTooltip.init();
});