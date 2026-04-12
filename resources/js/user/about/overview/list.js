import CardSwiper from "../../modules/cardSwiper";
import SelectFilter from '../../modules/selectFilter';

document.addEventListener("DOMContentLoaded", function () {
    const cardSwipers = CardSwiper.initAll(".js-cardSwiper", {
        debug: true
    });
    
    const filter = new SelectFilter('.js-filterGroup-select');
});

(function () {
    const BREAKPOINT = 769;

    function getCollapsedHeight(list) {
        const cols =
            getComputedStyle(list).gridTemplateColumns.split(" ").length;
        const cards = list.querySelectorAll(".cardItem");
        const gap = parseFloat(getComputedStyle(list).rowGap) || 0;

        let maxHeight = 0;
        cards.forEach(function (card, i) {
            if (i < cols) maxHeight = Math.max(maxHeight, card.offsetHeight);
        });

        return maxHeight + gap;
    }

    function applyCollapsed(list) {
        list.style.maxHeight = getCollapsedHeight(list) + "px";
    }

    function applyExpanded(list) {
        list.style.maxHeight = list.scrollHeight + "px";
    }

    function clearMaxHeight(list) {
        list.style.maxHeight = "";
    }

    function init(list, button) {
        const collapseAction = list.parentElement
            ? list.parentElement.querySelector(".js-collapse-action")
            : null;

        let isExpanded = false;

        function handleResize() {
            if (window.innerWidth >= BREAKPOINT) {
                if (collapseAction) collapseAction.style.display = "";
                isExpanded ? applyExpanded(list) : applyCollapsed(list);
            } else {
                clearMaxHeight(list);
                if (collapseAction) collapseAction.style.display = "none";
            }
        }

        button.addEventListener("click", function () {
            isExpanded = !isExpanded;
            const btnText = button.querySelector(".btn__text") || button;

            button.classList.toggle("is-active", isExpanded);
            list.classList.toggle("is-active", isExpanded);

            if (isExpanded) {
                applyExpanded(list);
                btnText.textContent = btnText.dataset.collapseText;
            } else {
                applyCollapsed(list);
                btnText.textContent = btnText.dataset.expandText;
            }
        });

        window.addEventListener("resize", handleResize);
        handleResize();
    }

    document.querySelectorAll(".js-collapse-list").forEach(function (list) {
        const wrapper = list.parentElement;
        const button = wrapper
            ? wrapper.querySelector(".js-collapse-button")
            : document.querySelector(".js-collapse-button");

        if (button) init(list, button);
    });
})();
