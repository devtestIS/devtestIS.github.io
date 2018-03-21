module.exports = function (bh) {
    bh.match('account-link', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href:'#'
            })
    })
};