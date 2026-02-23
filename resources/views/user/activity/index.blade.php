<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>活動預約</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div>
            @foreach($activities as $activity)
                <hr>
                <h2>{{ $activity->project->venue_number }}</h2>
                <ul>
                @foreach($activity->activitySessions as $session)
                    <li>
                        <span>(已預約{{ $session->activityReservations->count() }}/{{ $session->normal_group_count }})</span>
                        <span> - </span>
                        <a
                            href="/activity/{{ $session->id }}/reservation"
                        >{{ $session->display_info }}</a></li>
                @endforeach
                </ul>
            @endforeach
        </div>
    </div>
</body>
</html>
