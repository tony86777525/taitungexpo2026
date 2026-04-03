import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

class ImageSwiper {
    constructor(selector, options = {}) {
        this.selector = selector;
        this.swiper = null;
        this.options = options;
        this.type = options.type || 'editor'; // 'editor' 或 'gallery'
        
        this.element = document.querySelector(this.selector);
        if (!this.element) return;

        this.initLogic();
        this.setupResizeListener();
    }

    _debounce(func, wait = 200) {
        let timeout;
        return (...args) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    setupResizeListener() {
        const debouncedCheck = this._debounce(() => {
            this.initLogic();
        }, 250);
        window.addEventListener('resize', debouncedCheck);
    }

    initLogic() {
        const windowWidth = window.innerWidth;

        if (this.type === 'gallery') {
            // Gallery 邏輯：1024px 以上才啟動
            const shouldBeActive = windowWidth >= 768;
            if (shouldBeActive && !this.swiper) {
                this.init();
            } else if (!shouldBeActive && this.swiper) {
                this.destroy();
            }
        } else {
            // Editor 邏輯：永遠啟動
            if (!this.swiper) {
                this.init();
            }
        }
    }

    init() {
        if (this.swiper) return;

        const element = this.element;
        const cardCount = element.querySelectorAll('.swiper-slide').length;

        // 尋找導覽按鈕 (優先找同層或父層級)
        let nextBtn = element.parentElement.querySelector('.swiper-button-next');
        let prevBtn = element.parentElement.querySelector('.swiper-button-prev');

        const defaultOptions = {
            modules: [Navigation, Autoplay, Pagination],
            slidesPerView: this.type === 'gallery' ? 3 : 1, // Gallery 為 3, Editor 為 1
            spaceBetween: 20,
            loop: cardCount > 1,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: nextBtn,
                prevEl: prevBtn,
            },
        };

        try {
            this.swiper = new Swiper(this.element, { ...defaultOptions, ...this.options });
        } catch (error) {
            console.error(`ImageSwiper [${this.type}] 初始化失敗:`, error);
        }
    }

    destroy() {
        if (this.swiper) {
            this.swiper.destroy(true, true);
            this.swiper = null;
        }
    }

    // 靜態方法：同時初始化兩種類型
    static initAll() {
        // 1. 初始化 Editor 類型 (slidesPerView: 1)
        const editors = document.querySelectorAll('.js-editorImgSwiper');
        editors.forEach((el, index) => {
            const uniqueClass = `js-editor-inst-${index}`;
            el.classList.add(uniqueClass);
            new ImageSwiper(`.${uniqueClass}`, { type: 'editor' });
        });

        // 2. 初始化 Gallery 類型 (slidesPerView: 3, breakpoint: 1024)
        const galleries = document.querySelectorAll('.js-galleryImgSwiper');
        galleries.forEach((el, index) => {
            const uniqueClass = `js-gallery-inst-${index}`;
            el.classList.add(uniqueClass);
            new ImageSwiper(`.${uniqueClass}`, { type: 'gallery' });
        });
    }
}

export default ImageSwiper;