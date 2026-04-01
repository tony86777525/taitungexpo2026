import './../modules/navbar';
class PopupManager {
    constructor() {
        this.init();
    }

    init() {
        try {
            this.initializePopup();
            // 如果有 resize 需求（例如某些樣式需計算），可保留，若純 CSS 則可移除
            this.setupResizeListener();
        } catch (error) {
            console.error('初始化失敗:', error.message);
        }
    }

    // 初始化 Popup 點擊與關閉事件
    initializePopup() {
        // 定義 ID 映射（根據你原本的邏輯：data-section 對應不同的內容顯示）
        const popupMapping = {
            'center': 0,
            '1': 1, '2': 2, '3': 3, '4': 4, '5': 5,
            '6': 6, '7': 7, '8': 8, '9': 9
        };

        // 1. 綁定視覺圖形（SVG 區塊）點擊事件
        document.querySelectorAll('.js-curatingBtn').forEach(element => {
            element.addEventListener('click', () => {
                const sectionNum = element.getAttribute('data-section');
                const popupId = popupMapping[sectionNum];
                
                if (popupId !== undefined) {
                    this.showPopup(popupId);
                }
            });

            // 手機觸控回饋效果
            element.addEventListener('touchstart', function() {
                this.style.fill = 'rgba(255, 255, 255, 0.05)';
            });

            element.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.style.fill = 'transparent';
                }, 100);
            });
        });

        // 2. 綁定關閉按鈕
        const closeButton = document.querySelector('.btn--closePopup');
        if (closeButton) {
            closeButton.addEventListener('click', () => this.hidePopup());
        }

        // 3. 點擊遮罩層 (Overlay) 關閉
        const overlay = document.querySelector('.popup__overlay');
        if (overlay) {
            overlay.addEventListener('click', () => this.hidePopup());
        }

        // 4. ESC 鍵關閉
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') this.hidePopup();
        });
    }

    /**
     * 顯示 Popup
     * @param {string|number} popupId 對應 HTML 中 [data-popup-id] 的值
     * @param {object} customData 可選，若需要從外部動態塞入特定文字
     */
    showPopup(popupId, customData = null) {
        const body = document.body;
        const popupContainer = document.getElementById('popup');
        const allContents = document.querySelectorAll('.popupBox__content');
        const targetContent = document.querySelector(`[data-popup-id="${popupId}"]`);

        if (!popupContainer || !targetContent) return;

        // 若有傳入 customData，可在顯示前更新內容 (塞字進去)
        if (customData) {
            this.updatePopupContent(targetContent, customData);
        }

        // 隱藏所有內容，只顯示目標內容
        allContents.forEach(content => content.style.display = 'none');
        targetContent.style.display = 'block';

        // 啟動開關
        popupContainer.classList.add('active');
        body.classList.add('openPopup');
    }

    // 隱藏 Popup
    hidePopup() {
        const body = document.body;
        const popup = document.getElementById('popup');
        if (!popup) return;

        popup.classList.remove('active');
        body.classList.remove('openPopup');
    }

    /**
     * 手動塞文字進特定 Popup 內容的方法
     * @param {HTMLElement} container 內容容器元素
     * @param {object} data 包含 title, desc 等資訊
     */
    updatePopupContent(container, data) {
        if (data.title) {
            const title = container.querySelector('.text__title');
            if (title) title.innerHTML = data.title;
        }
        if (data.desc) {
            const desc = container.querySelector('.text__desc');
            if (desc) desc.innerHTML = data.desc;
        }
        // ...依此類推可以塞入 tags 或其他欄位
    }

    setupResizeListener() {
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                // 如果 Popup 開啟時 resize 有特殊需求可寫在這
            }, 250);
        });
    }
}
const popupApp = new PopupManager();


document.addEventListener('DOMContentLoaded', () => {
    new PopupManager();
});