<!DOCTYPE html>
<html>
<head>
    <title>預約審核結果通知</title>
</head>
<body>
    <h1>團體導覽申請已通過</h1>
    <p>親愛的 {{ $reservation->contact_name }} 您好：</p>
    <p>您所申請的 2026 台東博覽會團體導覽（預約編號：{{ $reservation->id }}），已審核通過。</p>
    <p>感謝您的預約！</p>
</body>
</html>
