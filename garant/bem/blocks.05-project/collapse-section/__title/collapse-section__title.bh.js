module.exports = function (bh) {
    bh.match('collapse-section__title', function (ctx, json) {
        ctx.content([json.title, {
            block: 'icomoon', icon: 'arrow-expand'
        }]);
        ctx.attr('data-toggle', 'collapse');
        ctx.attr('data-target', '#' + json.target);
        ctx.attr('aria-expanded', 'false');
        ctx.tag('a');
        ctx.attr('href', 'javascript:void(0);')
    });
};

