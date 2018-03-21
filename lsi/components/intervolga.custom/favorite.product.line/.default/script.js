var favoriteLists = [];

function checkFavoriteStars() {
    var stars = $('[data-favorite]');
    stars.addClass('send');
    $.ajax({
        'url': '?ajaxRequest=Y',
        'method': 'post',
        'data': {
            'ajax': 'favorite.product.line',
            'action': 'ids'
        },
        'dataType': 'json',
        'success': function (data) {
            if (data['status'] && data['status'] == 'ok' && data['ids']) {
                for(var i = 0; i < data['ids'].length; i++) {
                    stars.filter('[data-favorite="' + data['ids'][i] + '"]')
                        .addClass('active')
                        .attr('data-original-title', 'Убрать<br/>из&nbsp;избранного')
                }
                stars.removeClass('send');
            }
        }
    });
}

function reloadList(key) {
    $.ajax({
        'url': '?ajaxRequest=Y',
        'method': 'post',
        'data': {
            'ajax': 'favorite.product.line',
            'action': 'reload',
            'list': key
        },
        'dataType': 'json',
        'success': function (data) {
            console.log(key);
            if (data['status'] && data['status'] == 'ok') {
                $('#' + key).html(data['body']);
            }
        }
    });
}

function reloadLists() {
    for(var i = 0; i < favoriteLists.length; i++) {
        reloadList(favoriteLists[i]);
    }
}

$(function () {
    $('[data-favorite]').tooltip({
        'html': true,
        'trigger': 'hover'
    });

    $(document).on('click', '[data-favarite-remove]', function () {
        var button = $(this);
        button.closest(".teaser-product").addClass("fade");
        $.ajax({
            'url': '?ajaxRequest=Y',
            'method': 'post',
            'data': {
                'ajax': 'favorite.product.line',
                'action': 'remove',
                'product': button.data('favarite-remove')
            },
            'dataType': 'json',
            'success': function (data) {
                if (data['status'] && data['status'] == 'ok') {
                    if(isFavoritePage){
                        window.location.reload();
                    } else {
                    	var star = $("[data-favorite='"+button.data('favarite-remove')+"']");
	                    star.removeClass('active').tooltip('hide').attr('data-original-title', 'Добавить<br/>в&nbsp;избранное');
                        reloadLists();
                    }
                } else {
                    alert(data['error'] ? data['error'] : 'При удалении из избранного возникли проблемы, попробуйте позже.');
                }
            },
            'error': function () {
                alert('При удалении из избранного возникли проблемы, попробуйте позже.');
            },
            'complete': function () {
            }
        });
    });

    $(document).on('click', '[data-favorite]', function () {
        var star = $(this);
        if (star.hasClass('send')) {
            return false;
        }
        star.addClass('send');
        if (star.hasClass('active')) {
            $.ajax({
                'url': '?ajaxRequest=Y',
                'method': 'post',
                'data': {
                    'ajax': 'favorite.product.line',
                    'action': 'remove',
                    'product': star.data('favorite')
                },
                'dataType': 'json',
                'success': function (data) {
                    if (data['status'] && data['status'] == 'ok') {
                        if(isFavoritePage){
                            window.location.reload();
                        } else {
                            star.removeClass('active').tooltip('hide').attr('data-original-title', 'Добавить<br/>в&nbsp;избранное');
                            reloadLists();
                        }
                    } else {
                        alert(data['error'] ? data['error'] : 'При удалении из избранного возникли проблемы, попробуйте позже.');
                    }
                },
                'error': function () {
                    alert('При удалении из избранного возникли проблемы, попробуйте позже.');
                },
                'complete': function () {
                    star.removeClass('send');
                }
            });
        } else {
            $.ajax({
                'url': '?ajaxRequest=Y',
                'method': 'post',
                'data': {
                    'ajax': 'favorite.product.line',
                    'action': 'add',
                    'product': star.data('favorite')
                },
                'dataType': 'json',
                'success': function (data) {
                    if (data['status'] && data['status'] == 'ok') {
                        star.addClass('active').tooltip('hide').attr('data-original-title', 'Убрать<br/>из&nbsp;избранного');
                        reloadLists();
                    } else {
                        alert(data['error'] ? data['error'] : 'При добавлении в избранное возникли проблемы, попробуйте позже.');
                    }
                },
                'error': function () {
                    alert('При добавлении в избранное возникли проблемы, попробуйте позже.');
                },
                'complete': function () {
                    star.removeClass('send');
                }
            });
        }

        return false;
    });

    checkFavoriteStars();
});