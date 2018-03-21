module.exports = function (bh) {
    bh.match('table', function (ctx, json) {
        bh._options.replacements['table_color_striped'] = 'table-striped';
        bh._options.replacements['table_type_bordered'] = 'table-bordered';
        bh._options.replacements['table_state_hover'] = 'table-hover';
        bh._options.replacements['table_size_condensed'] = 'table-condensed';
        bh._options.replacements['table_responsive'] = 'table-responsive';

        ctx.tag('table');
        ctx.mod('responsive') && ctx.tag('div', true).content([
            {block: 'table', content: [
                ctx.content()
            ]}
        ], true);
    });
};