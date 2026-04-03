<?php

namespace App\Http\Controllers\Api;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws Throwable
     */
    public function getEventList(Request $request)
    {
        $date = $request->date('date');

        if (empty($date)) {
            $activities = collect();
        } else {
            $activities = Activity::query()
                ->with([
                    'activitySessions' => function ($query) {
                        $query
                            ->where('is_active', true);
                    },
                    'activitySessions.activityReservations' => function ($query) {
                        $query
                            ->where('status', '!=', ActivityReservationStatus::CANCELLED)
                            ->where('type', ActivityReservationType::NORMAL);
                    },
                    'activityNatures',
                    'projectTypes',
                    'project',
                ])
                ->where('activity_start_date', '<=', Carbon::parse($date)->format('Y-m-d'))
                ->where('activity_end_date', '>=', Carbon::parse($date)->format('Y-m-d'))
                ->where('is_active', true)
                ->get();
        }


        $html = view('user.event.search-result', [
            'activities' => $activities
        ])->render();

        return response()->json([
            'html' => $html,
        ]);
    }
}
