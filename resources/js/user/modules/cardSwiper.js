import Swiper from 'swiper';
import { Autoplay, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

class CardSwiper {
    constructor(selector, options = {}) {
        this.selector = selector;
        this.swiper = null;
        this.options = options;
        
        this.debug = options.debug || false;
        
        this.init();
    }

    log(...args) {
        if (this.debug) console.log(...args);
    }

    init() {
        const element = document.querySelector(this.selector);
        
        if (!element) {
            return;
        }

        const slides = element.querySelectorAll('.swiper-slide');

        let nextBtn = element.querySelector('.swiper-button-next');
        let prevBtn = element.querySelector('.swiper-button-prev');
        
        if (!nextBtn && element.parentElement) {
            nextBtn = element.parentElement.querySelector('.swiper-button-next');
        }
        if (!prevBtn && element.parentElement) {
            prevBtn = element.parentElement.querySelector('.swiper-button-prev');
        }

        const defaultOptions = {
            modules: [Navigation, Autoplay],
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 20,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: nextBtn,
                prevEl: prevBtn,
            },
            breakpoints: {
                560: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            },
            on: {
                init: (swiper) => {
                    const nextBtn = swiper.navigation.nextEl;
                    const prevBtn = swiper.navigation.prevEl;
                }
            }
        };

        const swiperOptions = { ...defaultOptions, ...this.options };
        
        try {
            this.swiper = new Swiper(this.selector, swiperOptions);
        } catch (error) {
            console.error(error);
        }
    }

    destroy() {
        if (this.swiper) {
            this.swiper.destroy(true, true);
        }
    }
}

export default CardSwiper;