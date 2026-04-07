const BREAKPOINT = 1280;

function isMobile() {
  return window.innerWidth < BREAKPOINT;
}

function closeAllSubMenus(except = null) {
  document.querySelectorAll('.js-submenu-switcher').forEach(item => {
    if (item === except) return;
    item.classList.remove('is-open');
    const sub = item.querySelector('.subMenu');
    if (sub) sub.classList.remove('is-active');
    const text = item.querySelector(':scope > .menuText');
    if (text) text.classList.remove('is-active');
  });
}

function initMobileClick() {
  document.querySelectorAll('.js-submenu-switcher').forEach(item => {
    const trigger = item.querySelector(':scope > .menuText');
    if (!trigger) return;

    trigger.addEventListener('click', () => {
      if (!isMobile()) return;

      const isOpen = item.classList.contains('is-open');
      closeAllSubMenus(isOpen ? null : item);
      if (!isOpen) {
        item.classList.add('is-open');
        item.querySelector('.subMenu')?.classList.add('is-active');
        trigger.classList.add('is-active');
      } else {
        item.classList.remove('is-open');
        item.querySelector('.subMenu')?.classList.remove('is-active');
        trigger.classList.remove('is-active');
      }
    });
  });
}

function initDesktopHover() {
  document.querySelectorAll('.js-submenu-switcher').forEach(item => {
    item.addEventListener('mouseenter', () => {
      if (isMobile()) return;

      closeAllSubMenus(item);
      item.classList.add('is-open');
      item.querySelector('.subMenu')?.classList.add('is-active');
      item.querySelector(':scope > .menuText')?.classList.add('is-active');
    });

    item.addEventListener('mouseleave', () => {
      if (isMobile()) return;

      item.classList.remove('is-open');
      item.querySelector('.subMenu')?.classList.remove('is-active');
      item.querySelector(':scope > .menuText')?.classList.remove('is-active');
    });
  });
}

function initAnchorClose() {
    document.querySelectorAll('.subMenu .menuText[href*="#"]').forEach(link => {
        link.addEventListener('click', () => {
            if (!isMobile()) return;

            const linkPath = link.pathname;
            const currentPath = window.location.pathname;

            if (linkPath === currentPath) {
              closeAllSubMenus();

              document.querySelector('.js-navigation')?.classList.remove('is-open');
              document.body.classList.remove('openNav');
            }
        });
    });
}

window.addEventListener('resize', () => {
  if (!isMobile()) {
    closeAllSubMenus();
  }
});

document.addEventListener('DOMContentLoaded', () => {
  initMobileClick();
  initDesktopHover();
  initAnchorClose();
});