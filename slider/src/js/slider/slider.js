document.addEventListener('DOMContentLoaded', (e) => {
    const className = 'promo-slider';
    const sliderClass = 'slider';
    const sliders = [...document.querySelectorAll(`.${className}`)];
    let animation = true;
    const animationSlider = (slider, direction) => {
        animation = false;
        const forward = direction === 'right';
        const items = [...slider.children];
        const active = items.find(element => element.classList.contains('active'));
        const nextSibling = active.nextElementSibling || slider.appendChild(items[0]);
        const prevSibling = active.previousElementSibling || slider.insertBefore(slider.lastChild, active);
        const activeNext = forward ? nextSibling : prevSibling;
        const directionClass = forward ? 'slider-forward' : 'slider-backwards';
        if (!forward) {
            activeNext.classList.add('backward');
        }
        active.classList.remove('active');
        active.classList.add('animate');
        activeNext.classList.add('active');
        activeNext.classList.add('animate');

        const animateObserve = () => {
            const options = {
                root: slider,
                rootMargin: '0px',
                threshold: 1.0
            };
            
            const io = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        active.classList.add(directionClass);
                        activeNext.classList.add(directionClass);
                        activeNext.addEventListener('transitionend', () => {
                            activeNext.classList.remove(directionClass, 'animate', 'backward');
                            active.classList.remove(directionClass, 'animate');
                            animation = true;
                        });
                        observer.unobserve(entry.target);
                    }
                });
                
            }, options);
            io.observe(active);
        };

        if(!('IntersectionObserver' in window)) {
            import('intersection-observer').then(() => {
                animateObserve();
            });
        } else {
            animateObserve();
        }
    };
    const buttonAction = (container, slider) => {
        container.addEventListener('click', (e) => {
            e.preventDefault();
            const target = e.target;
            const direction = target.dataset.direction;
            if (target.classList.contains(`${sliderClass}__button`) && animation) {
                animationSlider(slider, direction);
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
        slider.classList.add(`${sliderClass}-container`);
        sliderWrapper.classList.add(sliderClass);
        slider.appendChild(sliderWrapper);
        items.forEach((element, index) => {
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
});