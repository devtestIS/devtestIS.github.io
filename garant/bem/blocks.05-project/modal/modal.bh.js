module.exports = function (bh) {
    bh.match('modal', function (ctx, json) {
        ctx.mix({
            block: 'fade'
        });
        ctx.content([{
            block: 'modal-dialog',
            mods: {
                noscalable: json.scalable
            },
            content: [{
                block: 'modal-content',
                tag: 'form',
                content: [{
                    block: 'modal-header',
                    content: [{
                        block: 'close',
                        tag: 'button',
                        attrs: {
                            type: 'button',
                            'data-dismiss': 'modal',
                            'aria-label': 'Close'
                        },
                        content: [{
                            tag: 'span',
                            attrs: {
                                'aria-hidden': 'true'
                            },
                            content: '&times;'
                        }]
                    }]
                }, {
                    block: 'modal-body',
                    content: json.modalBody
                }, {
                    block: 'modal-footer',
                    content: [{
                        block: 'btn',
                        tag: 'button',
                        attrs: {
                            type: 'submit',
                            'data-dismiss': 'modal'
                        },
                        content: [
                            'Сохранить'
                        ]
                    }]
                }]
            }]
        }]);
    });
};

