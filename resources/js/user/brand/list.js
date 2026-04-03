import Swiper from 'swiper';
import { Autoplay, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import SelectFilter from '../modules/selectFilter';
class singleImgSlider {
    constructor(selector, options = {}) {
        this.selector = selector;
        this.options = options;
        this.init();
    }

    init() {
        this.initSwiper();
    }

    initSwiper() {
        const defaultOptions = {
            modules: [Navigation, Autoplay],
            autoplay: true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        };

        const swiperOptions = { ...defaultOptions, ...this.options };
        this.swiper = new Swiper(this.selector, swiperOptions);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const singleImgSwiper = new singleImgSlider('.js-singleImgSwiper');

    const filter = new SelectFilter('.js-filterGroup-select');
});
