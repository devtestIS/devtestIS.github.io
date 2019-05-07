document.addEventListener('DOMContentLoaded', (e) => {
    const className = 'promo-slider';
    const sliderClass = 'slider';
    const sliders = [...document.querySelectorAll(`.${className}`)];
    let animation = true;
    const animationCarousel = (slider, index) => {
        const items = [...slider.children];
        const active = items.find(element => element.classList.contains('active'));
        const nextActive = items[index];
        const currentIndex = items.indexOf(active);
        const direction = index > currentIndex;
        const carouselElements = direction ?  items.slice(currentIndex, index + 1) : items.slice(index, currentIndex + 1);
        const animateObserve = () => {
            const options = {
                root: slider,
                rootMargin: '0px',
                threshold: 1.0
            };
            
            const io = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        carouselElements.forEach((element, index) => {
                            element.style.transform = `translateX(${(direction ? -1 : 1) * (direction ? carouselElements.length - 1 : index) * 100}%)`;
                            element.addEventListener('transitionend',  function _listener() {
                                element.classList.remove('animate');
                                element.removeAttribute('style');
                                element.removeEventListener('transitionend', _listener);
                            });
                        });
                        observer.unobserve(entry.target);
                    }
                });
                
            }, options);
            io.observe(active);
            io.observe(nextActive);
        };
        active.classList.remove('active');
        carouselElements.forEach((element, index) => {
            element.classList.add('animate');
            if (!direction) {
                element.style.marginLeft = `-${(index) * 100}%`;
            }
        });
        animateObserve();
        nextActive.classList.add('active');
    };
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
                        activeNext.addEventListener('transitionend', function _listener() {
                            activeNext.classList.remove(directionClass, 'animate', 'backward');
                            active.classList.remove(directionClass, 'animate');
                            animation = true;
                            activeNext.removeEventListener('transitionend', _listener);   
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
    const dotAction = (container, slider, dots) => {
        container.addEventListener('click', (e) => {
            e.preventDefault();
            const target = e.target;
            if (target.classList.contains('dots__item') && animation) {
                const currentIndex = [...dots.children].indexOf(target);
                animationCarousel(slider, currentIndex);
            }   
        })
    };
    const createDots = (slider, sliderWrapper) => {
        const items = [...sliderWrapper.children];
        const dotWrapper = document.createElement('ul');
        dotWrapper.classList.add(`dots`);
        for (let index = 0; index < items.length; index++) {
            const dot = document.createElement('li');
            dot.classList.add(`dots__item`);
            dotWrapper.appendChild(dot);            
        }
        slider.appendChild(dotWrapper);
        return dotWrapper;
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
        items.forEach((element) => {
            element.classList.add(`${sliderClass}__item`);
            sliderWrapper.appendChild(slider.removeChild(element));
        });
        items[0].classList.add('active');
        return sliderWrapper;
    };
    sliders.forEach(element => {
        const sliderWrapper = createSlider(element);
        const dots = createDots(element, sliderWrapper);
        createButton(element); 
        buttonAction(element, sliderWrapper);
        dotAction(element, sliderWrapper, dots);
    });
});