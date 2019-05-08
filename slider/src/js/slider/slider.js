document.addEventListener('DOMContentLoaded', (e) => {
    const init = () => {
        const className = 'promo-slider';
        const sliderClass = 'slider';
        const sliders = [...document.querySelectorAll(`.${className}`)];
        const sliderAnimation = (slider, ratio) => {
            const currentTransform = Number(slider.style.transform.split(/ /)[0].replace(/[^-.0-9]/g,''));
            const items = [...slider.children];
            const width = slider.getBoundingClientRect().width/items.length;
            const translateX = currentTransform + ratio * width;
            const options = {
                root: slider.parentElement,
                rootMargin: '0px',
                threshold: 1.0
            };
            const io = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    const target = entry.target;
                    if (entry.isIntersecting) {
                        entries.forEach(element => {
                            element.target.classList.remove('active')
                        });
                        target.classList.add('active');
                        observer.unobserve(target);
                    }
                });
                
            }, options);
            const range = Number(slider.style.transform.split(/ /)[0].replace(/[^\d]/g, '')) >= width;
            slider.addEventListener('transitionend', function _listener() {
                items.forEach(element => {
                    io.observe(element);
                });
                slider.removeEventListener('transitionend', _listener);
            });
            slider.style.transform = `translateX(${translateX}px)`;
        };
        const buttonAction = (container, slider) => {
            container.addEventListener('click', (e) => {
                e.preventDefault();
                const target = e.target;
                const direction = target.dataset.direction;
                if (target.classList.contains(`${sliderClass}__button`)) {
                    sliderAnimation(slider, direction === 'right' ? -1 : 1);
                }   
            });
        };

        const createButton = (slider) => {
            const buttonLeft = document.createElement('button');
            const buttonRight = document.createElement('button');
            buttonLeft.innerText = 'left';
            buttonRight.innerText = 'right';
            buttonLeft.dataset.direction = 'left';
            buttonRight.dataset.direction = 'right';
            buttonLeft.classList.add(`${sliderClass}__button`, `${sliderClass}__button_left`);
            buttonRight.classList.add(`${sliderClass}__button`, `${sliderClass}__button_right`);
            slider.appendChild(buttonLeft);
            slider.appendChild(buttonRight);
        };
        const createSlider = (slider) => {
            const items = [...slider.children];
            const sliderWrapper = document.createElement('div');
            const sliderWidth = slider.getBoundingClientRect().width;
            sliderWrapper.style.width = `${sliderWidth * items.length}px`;
            items.forEach(element => {
                element.style.width = `${sliderWidth}px`;
            });
            slider.classList.add(`${sliderClass}-container`);
            sliderWrapper.classList.add(sliderClass);
            slider.appendChild(sliderWrapper);
            items.forEach((element) => {
                element.classList.add(`${sliderClass}__item`);
                sliderWrapper.appendChild(slider.removeChild(element));
            });
            items[0].classList.add('active');
            return sliderWrapper;
        };
        sliders.forEach(element => {
            const sliderWrapper = createSlider(element);
            createButton(element); 
            buttonAction(element, sliderWrapper);
        });
    };
    if(!('IntersectionObserver' in window)) {
        import('intersection-observer').then(() => {
            init();
        });
    } else {
        init();
    }
    
});