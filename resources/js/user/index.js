import CarouselSlider from './modules/mediaSwiper';
import CardSwiper from './modules/cardSwiper';
import SelectTab from './modules/selectTab';

document.addEventListener('DOMContentLoaded', function() {
    const carousel = new CarouselSlider('.js-mediaSwiper', {
        showOnInit: true,
        debug: import.meta.env.DEV
    });

	const cardSwipers = CardSwiper.initAll('.js-cardSwiper', {
        debug: true,
    });

	const tab = new SelectTab('.js-tabGroup');
});