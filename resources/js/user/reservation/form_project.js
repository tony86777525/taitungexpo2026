import '@chenfengyuan/datepicker';
function init() {
    /* ── Data ──────────────────────────────────────────────────────────── */
    if (!window.canBookActivitySessions) {
        return;
    }

    window.filterParams = {
        'date': '',
        'time_range': '',
    };

    const canBookActivitySessions = Object.values(window.canBookActivitySessions || {});
    const sessionDateOptions = Object.values(window.sessionDateOptions || {});
    const sessionTimeOptions = Object.values(window.sessionTimeOptions || {});

    const selectActivitySession = document.getElementById('activity_session_id');
    const selectDate = document.getElementById('datepicker');
    const selectTime = document.getElementById('sel-time');
    const selectQuota = document.getElementById('sel-count');

    /* ── Datepicker ────────────────────────────────────────────────────── */
    $('#datepicker')
        .datepicker({
            format: 'yyyy-mm-dd',
            autoHide: true,
            startDate: new Date(),
            filter: function(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const formattedDate = `${year}-${month}-${day}`;

                return sessionDateOptions.some(item => item.value === formattedDate);
            }
        })
        .on('pick.datepicker', function (e) {
            window.filterParams.date = $(this).datepicker('getDate', true);
            window.filterParams.zone_id = '';
            window.filterParams.project_id = '';
            window.filterParams.time_range = '';
            filterSelect(e.target)
        });

    selectTime.addEventListener('change', (e) => {
        window.filterParams.time_range = e.target.value;
        filterSelect(e.target);
    });

    function filterSelect(currentSelect) {
        window.filterActivitySessions = canBookActivitySessions.filter((session) => {
            let findDate = false;
            if (window.filterParams.date === '' || window.filterParams.date === session.date) {
                findDate = true;
            }
            let findTime = false;
            if (window.filterParams.time_range === '' || window.filterParams.time_range === session.time_range) {
                findTime = true;
            }

            return findDate && findTime
        });

        selectQuota.innerHTML = '<option value="">　</option>';

        if (currentSelect === selectTime) {
            if (window.filterActivitySessions.length === 1) {
                const currentActivitySession = window.filterActivitySessions[0];
                window.filterParams.activity_session_id = currentActivitySession.activity_session_id;
                selectActivitySession.value = window.filterParams.activity_session_id;

                for (let i = currentActivitySession.quota_min; i <= currentActivitySession.quota_max; i++) {
                    // 建立新選項 (顯示文字為 i，數值為 i)
                    const opt = new Option(i, i);
                    // 將選項加入 select
                    selectQuota.add(opt);
                }
            }
        }

        if (currentSelect !== selectTime) {
            const filterSessionTimeOptions = sessionTimeOptions.filter(function (sessionTimeOption) {
                return window.filterActivitySessions.some(filterActivitySession => filterActivitySession.time_range === sessionTimeOption.value);
            });

            renewSelect(selectTime, filterSessionTimeOptions, window.filterParams.time_range);
        }
    }

    function renewSelect(currentSelect, newOptions, currentValue) {
        currentSelect.innerHTML = '<option value="">　</option>';
        newOptions.forEach(newOption => {
            // simply omit non-allowed options
            const opt = document.createElement('option');
            opt.value = newOption.value;
            opt.textContent = newOption.label;
            // if (newOption.value === currentValue) {
            //     opt.selected = true;
            // }
            currentSelect.appendChild(opt);
        });

        currentSelect.value = currentValue;
    }
}
init();

window.addEventListener('DOMContentLoaded', (event) => {
    const oldInput = window.oldInput;

    if (oldInput) {
        const selectDate = document.getElementById('datepicker');
        const selectTime = document.getElementById('sel-time');
        const selectQuota = document.getElementById('sel-count');

        // 建立一個 change 事件
        const changeEvent = new Event('change');

        // 觸發事件
        selectDate.dispatchEvent(changeEvent);
        selectTime.dispatchEvent(changeEvent);

        selectTime.value = oldInput.time_range;
        selectQuota.value = oldInput.participants_quota;
    }
});
