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
        $eventDays = DB::table('activities')
            ->join('projects', 'projects.id', '=', 'activities.project_id')
            ->where('activities.is_active', true)
            ->where('projects.is_active', true)
            ->select('activities.activity_start_date as start', 'activities.activity_end_date as end')
            ->get()
            ->flatMap(function ($row) {
                $period = new DatePeriod(
                    Carbon::parse($row->start),
                    new DateInterval('P1D'),
                    Carbon::parse($row->end)->addDay()
                );

                $dates = [];
                foreach ($period as $date) {
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
