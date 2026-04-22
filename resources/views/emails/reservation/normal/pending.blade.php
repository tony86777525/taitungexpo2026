@php
    $fontStyle = "font-size: 11px; line-height: 1; color: #4d4d4d; font-family: 'Microsoft JhengHei', '微軟正黑體', sans-serif;";
    $noticeFontStyle = "font-size: 11px; line-height: 1; color: #ff0000; font-family: 'Microsoft JhengHei', '微軟正黑體', sans-serif;";
    $linkFontStyle = "font-size: 11px; line-height: 1; font-family: 'Microsoft JhengHei', '微軟正黑體', sans-serif;";
@endphp
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>2026台東博覽會-團體導覽預約申請</title>
</head>
<body style="margin: 0; padding: 20px; background-color: #ffffff;">

<div style="max-width: 800px; margin: 0 auto; border: 1px solid #cccccc; padding: 20px;">

    <div style="text-align: center; font-weight: bold; margin-bottom: 10px; {{ $fontStyle }}">
        2026台東博覽會-團體導覽預約申請<br>
        Taitung Expo — Group Guided Tour Application
    </div>

    <hr style="border: 0; border-top: 1px solid #333333; margin: 15px 0;">

    <p style="{{ $fontStyle }}">您好，已收到您的團體導覽預約申請，相關資訊如下：
        <br>您的申請目前 <span style="font-weight: bold; {{ $noticeFontStyle }}">已進入審核流程，最終結果將另行通知</span>，請留意後續電子郵件
        <br>Your application has been received and is currently under review. You will be notified of the result by email. Please check your inbox.</p>

    <p>
        <span style="background-color: rgba(233, 218, 62, 0.7); font-weight: bold; {{ $fontStyle }}">【預約編號/ Reservation No.:{{ $reservation->order_number }}】</span>
    </p>

    <div style="{{ $fontStyle }}">
        日期 / Date：{{ $reservation->activitySession->display_date_for_datepicker }}<br>
        場館 / Venue：{{ $reservation->activitySession->project->display_venue_number_and_name }}<br>
        時段 / Time Slot：{{ $reservation->activitySession->project->display_time_range }}<br>
        預約人數 / Number of Participants：{{ $reservation->participants_quota }} 人<br>
        團體名稱 / Group：{{ $reservation->contact_group_name }}<br>
        聯絡人 / Contact：{{ $reservation->display_contact_dear_name }}<br>
        電話 / Phone：{{ $reservation->contact_phone }}<br>
        Email：{{ $reservation->contact_email }}<br>
        備註 / Remarks：<br>
        {!! nl2br($reservation->notes) !!}
    </div>

    <hr style="border: 0; border-top: 1px solid #cccccc; margin: 15px 0;">

    <p>
        <span style="background-color: rgba(233, 218, 62, 0.7); font-weight: bold; {{ $fontStyle }}">【活動提醒事項/ Notes】</span>
    </p>
    <p style="{{ $fontStyle }}">{!! nl2br($reservation->activitySession->tour_venue_note) !!}</p>

    <p>
        <span style="background-color: rgba(233, 218, 62, 0.7); font-weight: bold; {{ $fontStyle }}">【活動聯絡資訊/ Contact Information】</span>
    </p>
    <p style="{{ $fontStyle }}">
        聯絡人 / Contact Person：{{ $reservation->activitySession->contact_name }}<br>
        聯絡電話 / Phone：{{ $reservation->activitySession->contact_phone }}<br>
        Email：{{ $reservation->activitySession->contact_email }}
    </p>

    <div style="margin-top: 30px;">
        <p style="{{ $fontStyle }}">※ 本信件為系統自動發送，請勿直接回覆。
            <br>This is an automated system email. Please do not reply.</p>
    </div>

    <div style="margin-top: 30px;">
        <p style="{{ $fontStyle }}">※ 更多展會最新資訊，歡迎參閱：<br>
            For more information, please visit:<br>
            <a href="{{ route('user.index') }}" style="{{ $linkFontStyle }}"><strong>Official Website</strong></a> |
            <a href="https://www.facebook.com/taitungexpo2026" style="{{ $linkFontStyle }}"><strong>Facebook</strong></a>
        </p>
    </div>

    <div style="margin-top: 30px; font-weight: bold; {{ $fontStyle }}">
        Sincerely,<br>
        2026台東博覽會Taitung Expo
    </div>
</div>
</body>
</html>
