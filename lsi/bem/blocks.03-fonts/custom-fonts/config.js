/**
 * Список опций "наблюдателя за загрузкой шрифта"
 * Каждый поднабор (файл шрифта) из CSS-файла необходимо описать отдельным элементом данного списка.
 *
 * Описание состоит из
 * 1 обязательного параметра:
 *  - Назание семейства шрифта
 *
 * и 3 опциональных:
 *  - Опции начертания https://github.com/bramstein/fontfaceobserver#how-to-use
 *      - Стиль
 *      - Толщина
 *      - Ширина
 *
 *  - Строка для проверки загруженности шрифта (по умолчанию BESbswy).
 *    Важно указывать в случае если шрифт содержит специфичные символы как в FontAwesome
 *    В случае если шрифт разбит на поднаборы по языкам рекомендуется использовать строку &#1081;&#1103;&#1046; для кирилицы.
 *
 *  - Время ожидания загрузки (милисекунды, по умолчанию 30 секунд) после которого происходит окончательный отказ в пользу системных шрифтов
 */

var customFonts = [
    // [
    //    'Open Sans',
    //    {
    //        style: 'normal',
    //        weight: 400,
    //        stretch: 'normal'
    //    },
    //    'BESbswy',
    //    3000
    // ],
    //
    // ['Open Sans', {
    //    style: 'normal',
    //    weight: 700
    // }],
    // ['Open Sans', {
    //    style: 'normal',
    //    weight: 400
    // }],

    ['Open Sans', {
        style: 'normal',
        weight: 300
    }],
    ['Open Sans', {
        style: 'normal',
        weight: 400
    }],
    ['Open Sans', {
        style: 'normal',
        weight: 500
    }],
    ['Open Sans', {
        style: 'normal',
        weight: 700
    }],
    ['Open Sans', {
        style: 'normal',
        weight: 900
    }],

    ['PT Sans', {
        style: 'normal',
        weight: 400
    }],
    ['PT Sans', {
        style: 'normal',
        weight: 700
    }],

];

module.exports = customFonts;
