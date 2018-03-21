$(document).ready(function()
{
    var arrPage = [
        {label: 'index', value: 'index'},
        {label: 'profile', value: 'profile'},
        {label: 'rate', value: 'rate'},
        {label: 'support', value: 'support'},
        {label: 'tarifs', value: 'tarifs'},
        {label: 'text', value: 'text'},
        {label: 'tickets', value: 'tickets'},
        {label: 'finances', value: 'finances'},
        {label: 'feedbacks', value: 'feedbacks'},
        {label: 'admin-services', value: 'admin-services'},
        {label: 'admin-panel', value: 'admin-panel'},
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
