import './modules/navbar';
// import '../../modules/modal';
// import '../../modules/megaModal';
// import '../../modules/collapse';
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

$(function(){
    $(document).on('scroll', function () {
		var $nav = $(".l-header .sticky-wrapper");
		$nav.toggleClass("header-sticky", $(this).scrollTop() > (($nav.height())*2));
	});

	$(".js-navOpen").on('click', function () {
		$(".js-navigation").addClass("is-open");
		$('body').addClass('openNav');
	});

	$(".js-navClose").on('click', function () {
		$(".js-navigation").removeClass("is-open");
		$('body').removeClass('openNav');
	});

    var headerH = $('.l-header').outerHeight(true);
	$(".js-anchor").on('click', function (e) {

		if (this.hash !== "") {
			e.preventDefault();

			var hash = this.hash;

			$('html, body').animate({
				scrollTop: ($(hash).offset().top) - (headerH + 50)
			}, 800);

			$(".js-navigation").removeClass("is-open");
			$('body').removeClass('openNav');
		}
	});
});