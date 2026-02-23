<?php

namespace App\Http\Controllers;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::query()
            ->with([
                'project',
                'project.zone',
                'activitySessions',
                'activitySessions.activityReservations' => function ($query) {
                    $query
                        ->where('status', '!=', ActivityReservationStatus::CANCELLED)
                        ->where('type', ActivityReservationType::NORMAL);
                },
            ])
            ->where('is_active', true)
            ->get();

        return view('user.activity.index', compact('activities'));
    }
}
