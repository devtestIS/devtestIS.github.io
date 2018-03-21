module.exports = function (bh) {
    bh.match('search', function (ctx, json) {
        var placeholder = json.placeholder || 'Поиск';
        var icon;
        //если есть fa то иконка по умолчанию, 
        if (json.icon === 'fa') {
            icon = [{block: 'fa'}, {block: 'fa-search'}]
            //если есть что-то в icon добавить в класс с fa 
        } else if (json.icon) { 
            icon = [{block: 'fa'}, {block: json.icon}]
        }
        
        ctx.tag('form')
            .content([
                {
                    elem: 'input',
                    tag: 'input',
                    attrs: {
                        type: 'text',
                        placeholder: placeholder
                    }
                },
                {
                    elem: 'btn',
                    tag: 'button',
                    attrs: {
                        type: 'button'
                    },
                    mix: icon
                }
            ], true)
    })
}
