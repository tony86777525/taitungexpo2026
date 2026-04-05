(function () {
  const BREAKPOINT = 768; // 與 CSS media query 對應

  function getOneRowHeight(list) {
    const firstCard = list.querySelector('.cardItem');
    if (!firstCard) return 0;
    const gap = parseFloat(getComputedStyle(list).rowGap) || 0;
    return firstCard.offsetHeight + gap;
  }

  function applyCollapsed(list) {
    list.style.maxHeight = getOneRowHeight(list) + 'px';
  }

  function applyExpanded(list) {
    list.style.maxHeight = list.scrollHeight + 'px';
    list.classList.add('is-active');
  }

  function clearMaxHeight(list) {
    list.style.maxHeight = '';
    list.classList.remove('is-active');
  }

  function init(list, button) {
    let isExpanded = false;

    function handleResize() {
      if (window.innerWidth >= BREAKPOINT) {
        isExpanded ? applyExpanded(list) : applyCollapsed(list);
        button.style.display = '';
      } else {
        clearMaxHeight(list);
        button.style.display = 'none';
      }
    }

    button.addEventListener('click', function () {
      isExpanded = !isExpanded;
      const btnText = button.querySelector('.btn__text') || button;

      if (isExpanded) {
        applyExpanded(list);
        button.classList.add('is-active');
        btnText.textContent = '收起內容';
      } else {
        applyCollapsed(list);
        button.classList.remove('is-active');
        btnText.textContent = '完整內容';
      }
    });

    window.addEventListener('resize', handleResize);
    handleResize();
  }

  document.querySelectorAll('.js-collapse-list').forEach(function (list) {
    const wrapper = list.parentElement;
    const button = wrapper
      ? wrapper.querySelector('.js-collapse-button')
      : document.querySelector('.js-collapse-button');

    if (button) init(list, button);
  });
})();