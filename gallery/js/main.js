(function () {//оборачиваем код в IIFE (Immediately Invoked Function Expression ) немедленно выполняющуюся функцию что бы изолировать наш код от глобальной области видимости
    document.addEventListener("DOMContentLoaded", function(event) {//вешаем на объект документ обработчик события DOMContentLoaded что бы код выполнялся только после парсинга страницы браузером и загрузки DOM древа
        var body = document.querySelector('body');// сохраняем в переменной ссылку на элемент body с помощью метода querySelector
        var gallery = document.querySelector('.gallery');// сохраняем в переменной ссылку на элемент gallery с помощью метода querySelector
        var zoom = document.querySelector('.zoom-view');// сохраняем в переменной ссылку на элемент zoom-view с помощью метода querySelector
        var image = document.createElement('img');//создаем элемент img и сохраняем ссылку на него в переменной

        image.style.display = 'none';//задаем элементу img свойство display: none чтобы он не отображался на странице изначально
        image.setAttribute('alt', 'zoom');//задаем изображению img атрибут alt="zoom" методом setAttribute
        zoom.appendChild(image);//вставляем получивщееся изображение в элемент zoom-view методом appendChild

        gallery.addEventListener('mouseover', function (e) {//вешаем на элемент gallery (чтобы оптимизировать работу события с помощью всплытия событий) обработчик события mouseover
            e.preventDefault();//убираем с элемента событие по умолчанию, если такое есть
            mouseZoomm(e);//вставляем функцию которая будет искать на каком именно изображении сейчас курсор, вытаскивать у изображения относительный путь и вставлять его в изображение из переменной image
            //в функцию передаем аргумент e - объект события с информацие о том что за событие, на каком элементе выполняется и т.д.
        }, false);

        function mouseZoomm (event) {//собственно объявляем функцию mouseZoomm с параметром event
            var target = event.target;//вытаскиваем из event свойство target (на каком элементе выполняется событие) и сохраняем в переменную
            
            if (target.tagName === 'IMG') {//проверяем с помощью свойства tagName, является ли тэг элемента картинкой img 
                //и если да 
                var imageSrc = target.getAttribute('src');//сохраняем относительный путь до картинки в imageSrc с помощью метода getAttribute
                image.setAttribute('src', imageSrc);//задаем ранее созданной "большой картинке" нужный путь с помощью imageSrc
                image.style.display = 'block';//показываем ранее спрятанную картинку
                //PROFIT
            }
        };

        gallery.addEventListener('click', function (e) {//вешаем на элемент gallery (чтобы оптимизировать работу события с помощью всплытия событий) обработчик события click
            e.preventDefault();//аналогично предыдущей функции
            setBackground(e);//аналогично предыдущей функции
        }, false);

        function setBackground (event) {//аналогично предыдущей функции
            var target = event.target;//аналогично предыдущей функции
            
            if (target.tagName === 'IMG') {//аналогично предыдущей функции
                var imageSrc = target.getAttribute('src');//опять сохраняем путь
                body.style.backgroundImage = 'url("' + imageSrc + '")';//только теперь вставляем его не в атрибут "src" у img, а в свойство стилей background-image у элемента body
                //таким образом задаем фон элементу body
                //PROFIT
            }
        };
      });//конец обработчика DOMContentLoaded
})();//конец IIFE