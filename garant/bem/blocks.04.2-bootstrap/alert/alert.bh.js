module.exports = function(bh) {
    bh.match('alert', function(ctx, json) {

        bh._options.replacements['alert_color_success'] = 'alert-success';
        bh._options.replacements['alert_color_info'] = 'alert-info';
        bh._options.replacements['alert_color_warning'] = 'alert-warning';
        bh._options.replacements['alert_color_danger'] = 'alert-danger';
        bh._options.replacements['alert_dismissible'] = 'alert-dismissible';

        ctx
            .attr('role', 'alert')
            .mod('color', 'info');
    });

};
