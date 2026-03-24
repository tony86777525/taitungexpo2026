import './../modules/navbar';
import { popupData } from './data.js';
class PopupManager {
    constructor() {
        this.data = popupData;
        this.init();
    }

    init() {
        this.bindEvents();
    }

    bindEvents() {
        document.querySelectorAll('.js-curatingBtn').forEach(el => {
            el.addEventListener('click', () => {
                const sectionKey = el.getAttribute('data-section');
                if (this.data[sectionKey]) {
                    this.renderAndShow(sectionKey);
                }
            });
        });

        const closeBtn = document.querySelector('.btn--closePopup');
        const overlay = document.querySelector('.popup__overlay');

        if (closeBtn) closeBtn.addEventListener('click', () => this.hide());
        if (overlay) overlay.addEventListener('click', () => this.hide());
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') this.hide(); });
    }

    renderAndShow(key) {
        const item = this.data[key];
        const container = document.getElementById('popupDynamicContent');
        if (!container) return;

        const tagsHtml = item.tags.map(text => `<li class="f-h5">${text}</li>`).join('');

        container.innerHTML = `
            <div class="popupBox__content" style="display:block">
                <div class="flexBox">
                    <div class="image"><img src="/images/about/curating/${item.id}.svg"></div>
                    <div class="text">
                        <div class="text__title f-h4">${item.title}</div>
                        <div class="text__desc f-p">${item.desc}</div>
                        <div class="text__tags">
                            <span class="title">策展議題</span>
                            <ul class="tags">
                                ${tagsHtml}
                            </ul>
                        </div>
                        <ul class="text__events">
                            <li>
                                <a href="#" class="eventLink">
                                    <span class="eventLink__locate">A6</span>
                                    <span class="eventLink__name">日日南島：緩行的文化旅動計畫</span>
                                </a>
                            </li>
                            <li>
                                <span class="eventLink">
                                    <span class="eventLink__locate">H10</span>
                                    <span class="eventLink__name">台東博覽會限定便當</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('popup').classList.add('active');
        document.body.classList.add('openPopup');
    }

    hide() {
        document.getElementById('popup').classList.remove('active');
        document.body.classList.remove('openPopup');
    }
}


document.addEventListener('DOMContentLoaded', () => {
    new PopupManager();
});