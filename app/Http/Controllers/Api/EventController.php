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
            $currentDate = Carbon::parse($date)->format('Y-m-d');
            $currentDay = Carbon::parse($date)->dayOfWeek;

            $activities = Activity::query()
                ->with([
                    'activityNatures',
                    'participationType',
                    'projectTypes',
                    'project',
                ])
                ->where('activity_start_date', '<=', $currentDate)
                ->where('activity_end_date', '>=', $currentDate)
                ->whereJsonDoesntContain('exclusion_rules->exclusion_days', $currentDay)
                ->whereJsonDoesntContain('exclusion_rules->exclusion_dates', $currentDate)
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
