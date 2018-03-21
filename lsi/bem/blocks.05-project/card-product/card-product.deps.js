[
    ({
        mustDeps: [
            {block: 'star'},
            {block: 'jquery-eqheight'},
            {block: '$js-tooltip'},
            {block: 'bootstrap'},
            {block: 'dotdotdot'},
         
        ]
    }),
    ({
        shouldDeps : [
            {elem: ['value-span', 'title', 'img', 'bottom', 'price', 'to-cart', 'control', 'comparison', 'features', 'features-name', 'value', 'label-line', 'old-price', 'row']},
            {block: 'card-product', elem: 'label', mod: 'type'},
            {block: 'btn', elem: ['icon-cart', 'icon-comparison']},
            {block: 'btn', elem: 'icon-comparison', mod: 'added'},

        ]
    })
]