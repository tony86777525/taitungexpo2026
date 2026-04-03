import WeeklyCalendar from '../modules/WeeklyCalendar';

const myCalendar = new WeeklyCalendar('.calendarSwiper', {
    eventDays: ["2026-3-5", "2026-3-12", "2026-3-19", "2026-3-28", "2026-7-23", "2026-7-26", "2026-7-31", "2026-8-15"],
    onDatePick: function(date, dateStr) {
        
        
        console.log("日期選擇器選中的日期為：", dateStr);

        // $.ajax({
        //     url: '/api/get-schedule',
        //     data: { target_date: dateStr },
        //     success: function(res) {
        //         // 渲染後端的行程資料到頁面上
        //         $('#event-list').html(res.html);
        //     }
        // });
    }
});