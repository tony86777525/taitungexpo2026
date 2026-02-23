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
        <h1>活動預約表單</h1>
        <h2>{{ $activitySession->activity->project->venue_number }}{{ $activitySession->display_info }}</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('activity.reservation.store') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" id="activity_session_id" name="activity_session_id" value="{{ $activitySession->id }}" required>
            <input type="hidden" class="form-control" id="type" name="type" value="{{ \App\Enums\ActivityReservationType::NORMAL->value }}" required>

            <div class="mb-3">
                <label for="contact_name" class="form-label">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" required>
            </div>

            <div class="mb-3">
                <label for="contact_phone" class="form-label">Contact Phone</label>
                <input type="text" class="form-control" id="contact_phone" name="contact_phone" required>
            </div>

            <div class="mb-3">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" required>
            </div>

            <div class="mb-3">
                <label for="contact_group_name" class="form-label">Group Name</label>
                <input type="text" class="form-control" id="contact_group_name" name="contact_group_name" required>
            </div>

            <div class="mb-3">
                <label for="participants_quota" class="form-label">Participants Quota</label>
                <input type="number" class="form-control" id="participants_quota" name="participants_quota" min="1" required>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
