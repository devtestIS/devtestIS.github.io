module.exports = function (bh) {
    bh.match('main', function (ctx, json) {
        ctx.tag('main').content([
            ctx.content(),
            {elem: 'up', content: [
                {elem: 'up-inner', content: [
                    {elem: 'up-text', content: [
                        {block: 'mal', content: [
                            {block: 'btn', mods: {color: 'info', size: 'xs'}, content: [
                                {block: 'fa', mix: {block: 'fa-2x'}, icon: 'angle-up'}
                            ]}
                        ]}
                    ]}
                ]}
            ]}
        ], true);
    });
};