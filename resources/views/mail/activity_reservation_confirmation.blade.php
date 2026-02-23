<!DOCTYPE html>
<html>
<head>
    <title>預約審核結果通知信</title>
</head>
<body>
    <h1>預約審核結果通知信</h1>
    <p>您好，</p>
    <p>感謝您申請 「2026台東博覽會團體導覽」，以下為您的申請結果與相關資訊：</p>
    <hr>
    <p>【預約編號】 {{ $reservation->id }}</p>
    <p>申請參訪日期：{{ $reservation->activitySession->display_date }}</p>
    <p>申請場館：{{ $reservation->activitySession->activity->project->venue_number }}</p>
    <p>申請時段：{{ $reservation->activitySession->display_time_range }}</p>
    <p>申請預約人數：{{ $reservation->participants_quota }} 人</p>
    <br>
    <p>團體名稱：{{ $reservation->contact_group_name }}</p>
    <p>聯絡人：{{ $reservation->contact_name }}</p>
    <p>電話：{{ $reservation->contact_phone }}</p>
    <p>Email：{{ $reservation->contact_email }} 人</p>
    <br>
    <p>備註：{{ $reservation->notes }}</p>
    <br>
    <p>【審核結果說明】</p>
    @if($reservation->status === \App\Enums\ActivityReservationStatus::PENDING)
        <p>您的團體導覽申請已通過審核，請依下列提醒事項準時到場。</p>
        <br>
        <p>活動提醒事項：（由各分展設定）</p>
        <p>●請於導覽開始前 XX 分鐘 於指定集合地點完成報到。</p>
        <p>●導覽期間請配合現場工作人員指引及場館參觀規範。</p>
        <p>●如需取消或調整，請於服務時間內致電 XXXXXX 辦理。</p>

        <p>敬祝　參訪圓滿順利</p>
    @else
        <p>很遺憾通知您，本次團體導覽申請未通過審核。</p>
        <br>
        <p>未通過原因：（由各分展勾選或填寫）</p>
        <p>☐該時段名額已滿 / ☐未達最低成團人數 / ☐場館服務量能調整</p>
        <p>☐申請資料未齊全或需修正 / ☐其他：____</p>
        <p>歡迎您重新選擇其他日期或時段再次提出申請。</p>
        <p>如有疑問，請於服務時間內致電 XXXXXX 洽詢。</p>
    @endif
</body>
</html>
