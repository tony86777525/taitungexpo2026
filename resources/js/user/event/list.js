import WeeklyCalendar from '../modules/WeeklyCalendar';

const myCalendar = new WeeklyCalendar('.calendarSwiper', {
    eventDays: window.eventDays ?? [],
    onDatePick: function(date, dateStr) {
        console.log("日期選擇器選中的日期為：", dateStr);

        const apiUrl = document.querySelector('meta[name="api-get-event-list"]').getAttribute('content');

        if(!apiUrl) {
            console.error('API Not Found');
        }

        $.ajax({
            url: apiUrl,
            data: {
                date: dateStr
            },
            type: 'POST',
            dataType: "json",
            beforeSend() {
                $('#search-result').empty();
            },
            success: function(res) {
                // 渲染後端的行程資料到頁面上
                $('#search-result').html(res.html);
            }
        });
    }
});
