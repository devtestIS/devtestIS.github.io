document.addEventListener('DOMContentLoaded', (e) => {
    const className = 'promo-slider';
    const sliderClass = 'slider';
    const sliders = [...document.querySelectorAll(`.${className}`)];
    let animation = true;
    const animationSlider = (slider, direction) => {
        const forward = direction === 'right';
        console.log(forward);
        animation = false;
        const active = [...slider.children].find(element => element.classList.contains('active'));
        const activeNext = active.nextElementSibling;
        active.classList.remove('active');
        const newItem = active.cloneNode(true);
        active.classList.add('slider-forward');
        activeNext.classList.add('slider-forward');
        activeNext.classList.add('active');
        activeNext.addEventListener('transitionend', () => {
            activeNext.classList.remove('slider-forward');
            active.remove();
            slider.appendChild(newItem);
            animation = true;
        });
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