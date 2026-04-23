const MOBILE_BREAKPOINT = 1281;

class SelectFilter {

  constructor(selector) {
    this.group   = typeof selector === 'string'
      ? document.querySelector(selector)
      : selector;

    if (!this.group) return;

    this.trigger = this.group.querySelector('.js-filterSelect');
    this.label   = this.group.querySelector('.js-selectedOption');
    this.options = this.group.querySelectorAll('.js-filterOption-item');
    this.panels  = this.group.querySelectorAll('.js-filterList-item');
    this.isOpen  = false;

    this._bindEvents();
  }

  static initAll(selector) {
    return [...document.querySelectorAll(selector)]
      .map(el => new SelectFilter(el));
  }

  _isMobile() {
    return window.innerWidth <= MOBILE_BREAKPOINT;
  }

  open() {
    this.isOpen = true;
    this.group.classList.add('is-open');
    this.trigger?.setAttribute('aria-expanded', 'true');
  }

  close() {
    this.isOpen = false;
    this.group.classList.remove('is-open');
    this.trigger?.setAttribute('aria-expanded', 'false');
  }

  toggle() {
    this.isOpen ? this.close() : this.open();
  }

  selectFilter(filterId, optionEl) {
    if (this.label) {
      this.label.textContent = optionEl.textContent.trim();
    }

    this.options.forEach(o => o.classList.remove('is-active'));
    optionEl.classList.add('is-active');

    this.panels.forEach(p => p.classList.remove('is-active'));

    if (this._isMobile()) this.close();
    // link to target category
    // window.location.href = `/${filterId}`;
  }

  _bindEvents() {
    this.trigger?.addEventListener('click', () => {
      if (!this._isMobile()) return;
      this.toggle();
    });

    this.options.forEach(opt => {
      opt.addEventListener('click', () => {
        this.selectFilter(opt.dataset.filterId, opt);
      });
    });

    document.addEventListener('click', (e) => {
      if (this._isMobile() && this.isOpen && !this.group.contains(e.target)) {
        this.close();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.isOpen) this.close();
    });

    window.addEventListener('resize', () => {
      if (!this._isMobile() && this.isOpen) this.close();
    });
  }
}

export default SelectFilter;