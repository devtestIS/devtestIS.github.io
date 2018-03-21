module.exports = function (bh) {

    bh.match('html5shiv-respond', function (ctx) {
        ctx.bem(false)
            .tag('script')
            .attr('data-skip-moving', 'true')
            .attr('src', '../../../bower_components/html5shiv/html5shiv-respond.min.js');

        return {
            block: 'conditional-comment',
            condition: '< IE 9',
            content: ctx.json()
        }
    });

};
