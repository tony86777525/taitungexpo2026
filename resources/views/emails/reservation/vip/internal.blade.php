@php
    $fontStyle = "font-size: 11px; line-height: 1; color: #4d4d4d; font-family: 'Microsoft JhengHei', '微軟正黑體', sans-serif;";
    $noticeFontStyle = "font-size: 11px; line-height: 1; color: #ff0000; font-family: 'Microsoft JhengHei', '微軟正黑體', sans-serif;";
    $linkFontStyle = "font-size: 11px; line-height: 1; font-family: 'Microsoft JhengHei', '微軟正黑體', sans-serif;";
@endphp
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>2026台東博覽會｜貴賓導覽預約確認</title>
</head>
<body style="margin: 0; padding: 20px; background-color: #ffffff;">

<div style="max-width: 800px; margin: 0 auto; border: 1px solid #cccccc; padding: 20px;">

    <div style="text-align: center; font-weight: bold; margin-bottom: 10px; {{ $fontStyle }}">
        2026台東博覽會-團體導覽預約申請
    </div>

    <hr style="border: 0; border-top: 1px solid #333333; margin: 15px 0;">

    <p style="{{ $fontStyle }}">您好，
        <br>已收到以下貴賓團體導覽預約資訊，請確認：</p>

    <p>
        <span style="background-color: rgba(233, 218, 62, 0.7); font-weight: bold; {{ $fontStyle }}">【預約編號/ Reservation No.:{{ $reservation->order_number }}】</span>
    </p>

    <div style="{{ $fontStyle }}">
        日期：{{ $reservation->activitySession->display_date_for_datepicker }}<br>
        場館：{{ $reservation->activitySession->project->display_venue_number_and_name }}<br>
        時段：{{ $reservation->activitySession->project->display_display_time_range }}<br>
        預約人數：{{ $reservation->participants_quota }} 人<br>
        團體名稱：{{ $reservation->contact_group_name }}<br>
        聯絡人：{{ $reservation->display_contact_dear_name }}<br>
        電話：{{ $reservation->contact_phone }}<br>
        Email：{{ $reservation->contact_email }}<br>
        備註：<br>
        {!! nl2br($reservation->notes) !!}
    </div>

    <p>
        <span style="background-color: rgba(233, 218, 62, 0.7); font-weight: bold; {{ $fontStyle }}">【活動提醒事項】</span>
    </p>
    <p style="{{ $fontStyle }}">{!! nl2br($reservation->activitySession->tour_venue_note) !!}</p>

    <p>
        <span style="background-color: rgba(233, 218, 62, 0.7); font-weight: bold; {{ $fontStyle }}">【領隊聯絡資訊】</span>
    </p>
    <p style="{{ $fontStyle }}">
        導覽領隊人：{{ $reservation->guide_leader_name }}<br>
        聯絡電話：{{ $reservation->guide_leader_phone }}<br>
        Email：{{ $reservation->guide_leader_email }}
    </p>

    <p>
        <span style="background-color: rgba(233, 218, 62, 0.7); font-weight: bold; {{ $fontStyle }}">【內部備註】</span>
    </p>
    <p style="{{ $fontStyle }}">{!! nl2br($reservation->vip_staff_only_notes) !!}</p>

    <div style="margin-top: 30px;">
        <p style="{{ $fontStyle }}">※ 本信件為系統自動發送，請勿直接回覆。</p>
    </div>

    <div style="margin-top: 30px; font-weight: bold; {{ $fontStyle }}">2026台東博覽會Taitung Expo</div>
</div>
</body>
</html>
