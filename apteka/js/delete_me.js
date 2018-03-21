$(document).ready(function()
{
    var arrPage = [
        {label: 'Главная', value: 'index'},
		{label: 'Главная регистрация физ.лиц', value: 'index-p-face-form'},
		{label: 'Кабинет редактирование', value: 'cabinet-edit'},
		{label: 'Кабинет', value: 'cabinet'},
		{label: 'Корзина', value: 'cart'},
		{label: 'Каталог', value: 'catalog'},
		{label: 'Контакт', value: 'contact'},
		{label: 'Контакты', value: 'contacts'},
		{label: 'Каталог главная', value: 'content-main'},
		{label: 'Товар', value: 'item'},
		{label: 'Новость', value: 'new'},
		{label: 'Новости', value: 'news'},
		{label: 'Физическим лицам', value: 'pface'},
		{label: 'Вопросы и ответы', value: 'question'},
		{label: 'Распознавание рецепта', value: 'recognize'},
		{label: 'Поиск', value: 'search'},
		{label: 'Юридическим лицам-2', value: 'uface-2'},
		{label: 'Юридическим лицам', value: 'uface'},

        {label: 'Вверх', value: '#'}

    ];

    $('<ol id="pages2342"></ol>').prependTo('body').css({'position':'fixed', 'left':-220,'top':'30%', 'width':240,'margin':0,
    'padding':'10px 20px 10px 40px', 'background':'rgb(200,200,200)','zIndex':54512, 'fontSize':12,'color':'black',
    'fontFamily':'Arial, sans-serif', 'lineHeight':'20px'});

    for (var i=0;i<arrPage.length;i++){
        $('#pages2342').append('<li><a href="' +arrPage[i].value+ '.html">' +arrPage[i].label+ '</a></li>')
    }

    $('#pages2342 li:last').prepend('^').append('^').css({'fontWeight':'bold', 'listStyle':'none','textAlign':'center'})
        .find('a').attr('href','#');
    $('<li><b>&raquo;</b></li>').appendTo('#pages2342').css({'position':'absolute','top':'50%','right':5,'height':12, 'listStyle':'none'});
    $('#pages2342').hover(function(){
        $(this).css('left',0);
    },
    function(){
        $(this).css('left',-220);
    });
});