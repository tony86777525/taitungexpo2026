<?php

namespace App\Http\Controllers\User;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivitySession;
use App\Models\Article;
use App\Models\Project;
use App\Models\Tag;
use Carbon\Carbon;
use DatePeriod;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $eventDays = Activity::query()
            ->join('projects', 'projects.id', '=', 'activities.project_id')
            ->where('activities.is_active', true)
            ->where('projects.is_active', true)
            ->select(
                'activities.activity_start_date as start',
                'activities.activity_end_date as end',
                'activities.exclusion_rules as exclusion_rules',
            )
            ->get()
            ->flatMap(function ($row) {
                $period = new DatePeriod(
                    Carbon::parse($row->start),
                    new DateInterval('P1D'),
                    Carbon::parse($row->end)->addDay()
                );

                $exclusionDays = $row->exclusion_rules['exclusion_days'] ?? [];
                $exclusionDates = $row->exclusion_rules['exclusion_dates'] ?? [];

                $dates = [];
                foreach ($period as $date) {

                    if (in_array(Carbon::parse($date)->dayOfWeek, $exclusionDays, true)) {
                        continue;
                    }
                    if (in_array(Carbon::parse($date)->format('Y-m-d'), $exclusionDates, true)) {
                        continue;
                    }
                    $dates[] = $date->format('Y-n-j');
                }

                return $dates; // 明確回傳陣列，flatMap 絕對接得到
            })
            ->unique()
            ->values()
            ->toArray();

        return view('user.event.list', compact(
            'eventDays'
        ));
    }

    public function detail(int $id)
    {
        $currentActivityId = $id;

        $activity = Activity::query()
            ->with([
                'activityNatures',
                'projectTypes',
                'project',
                'contents',
                'contents.images',
                'contents.links',
                'images',
            ])
            ->where('is_active', true)
            ->when(!empty($currentActivityId), function ($query) use ($currentActivityId) {
                $query->where('id', $currentActivityId);
            })
            ->first();

        abort_if(empty($activity), 404);

        return view('user.event.detail', compact(
            'activity'
        ));
    }
}
