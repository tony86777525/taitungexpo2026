import './modules/navbar';

const stickyBtn = document.querySelector('.js-stickyBtn');

if (stickyBtn) {
    const behavior = stickyBtn.dataset.behavior;

    if (behavior === 'scroll') {
        const secondSection = document.querySelectorAll('section')[1];

        stickyBtn.style.opacity = '0';
        stickyBtn.style.visibility = 'hidden';

        window.addEventListener('scroll', () => {
            if (!secondSection) return;

            const triggerPoint = secondSection.getBoundingClientRect().top + window.scrollY - 200;

            if (window.scrollY >= triggerPoint) {
                stickyBtn.style.opacity = '1';
                stickyBtn.style.visibility = 'visible';
            } else {
                stickyBtn.style.opacity = '0';
                stickyBtn.style.visibility = 'hidden';
            }
        });
    }
}

const goTopBtn = document.querySelector('.js-goTop');

if (goTopBtn) {
	console.log('123')
    goTopBtn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

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