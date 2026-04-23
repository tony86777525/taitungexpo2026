<?php

namespace App\Http\Controllers\User;

use App\Enums\ActivityReservationStatus;
use App\Http\Controllers\Controller;
use App\Models\ActivityReservation;
use App\Models\ActivityReservationNormal;
use App\Models\ActivitySessionNormal;

use App\Models\Project;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $activitySessions = ActivitySessionNormal::query()
            ->with([
                'project',
                'project.zone',
            ])
            ->withCount([
                'bookedActivityReservations',
            ])
            ->forFrontendCanBeBook()
            ->whereHas('project', function ($query) {
                $query->where('is_active', true);
            })
            ->whereHas('project.zone', function ($query) {
                $query->where('is_active', true);
            })
            ->where('is_active', true)
            ->get();

        abort_if($activitySessions->isEmpty(), 404);

        $canBookActivitySessions = $activitySessions->filter(function ($activitySession) {
            return $activitySession->can_book;
        });

        abort_if($canBookActivitySessions->isEmpty(), 404);

        $sessionDateOptions = $canBookActivitySessions
            ->sortBy('date')
            ->map(function ($data) {
                return [
                    'value' => $data->display_date_for_datepicker,
                    'label' => $data->display_date_for_datepicker,
                ];
            })
            ->unique()
            ->toArray();
        $zoneOptions = $canBookActivitySessions
            ->sortBy('project.zone.code')
            ->map(function ($data) {
                return [
                    'value' => $data->project->zone->id,
                    'label' => $data->project->zone->display_code_name,
                ];
            })
            ->unique()
            ->toArray();
        $projectOptions = $canBookActivitySessions
            ->sortBy(['project.zone.code', 'project.id'])
            ->map(function ($data) {
                return [
                    'value' => $data->project->id,
                    'label' => $data->project->display_venue_number_and_name,
                ];
            })
            ->unique()
            ->toArray();
        $sessionTimeOptions = $canBookActivitySessions
            ->sortBy(['start_time', 'end_time'])
            ->map(function ($data) {
                return [
                    'value' => $data->display_time_range,
                    'label' => $data->display_time_range,
                ];
            })
            ->unique()
            ->toArray();

        $canBookActivitySessions = $canBookActivitySessions
            ->map(function ($item) {
                // 這裡可以自由命名 Key 和加工 Value
                return [
                    'activity_session_id' => $item->id,
                    'date' => $item->display_date_for_datepicker,
                    'zone_id' => $item->project->zone->id,
                    'project_id' => $item->project->id,
                    'time_range' => $item->display_time_range,
                ];
            })
            ->toArray();

        $reservationFormData = [
            'canBookActivitySessions' => $canBookActivitySessions,
            'sessionDateOptions' => $sessionDateOptions,
            'zoneOptions' => $zoneOptions,
            'projectOptions' => $projectOptions,
            'sessionTimeOptions' => $sessionTimeOptions,
        ];

        return view('user.reservation.index', compact(
            'reservationFormData',
        ));
    }

    /**
     * @return View
     */
    public function project(int $id)
    {
        $currentProjectId = $id;

        $activitySessions = ActivitySessionNormal::query()
            ->with([
                'project',
                'project.zone',
            ])
            ->withCount([
                'bookedActivityReservations',
            ])
            ->forFrontendCanBeBook()
            ->whereHas('project', function ($query) {
                $query->where('is_active', true);
            })
            ->whereHas('project.zone', function ($query) {
                $query->where('is_active', true);
            })
            ->where('is_active', true)
            ->where('project_id', $currentProjectId)
            ->get();

        if ($activitySessions->isEmpty()) {
            $reservationFormData = $this->getEmptyFormData($currentProjectId);
            return view('user.reservation.index', compact(
                'reservationFormData',
            ));
        }
//        abort_if($activitySessions->isEmpty(), 404);

        $canBookActivitySessions = $activitySessions->filter(function ($activitySession) {
            return $activitySession->can_book;
        });

        if ($canBookActivitySessions->isEmpty()) {
            $reservationFormData = $this->getEmptyFormData($currentProjectId);
            return view('user.reservation.index', compact(
                'reservationFormData',
            ));
        }
//        abort_if($canBookActivitySessions->isEmpty(), 404);

        $sessionDateOptions = $canBookActivitySessions
            ->sortBy('date')
            ->map(function ($data) {
                return [
                    'value' => $data->display_date_for_datepicker,
                    'label' => $data->display_date_for_datepicker,
                ];
            })
            ->unique()
            ->toArray();
        $zoneOptions = $canBookActivitySessions
            ->sortBy('project.zone.code')
            ->map(function ($data) {
                return [
                    'value' => $data->project->zone->id,
                    'label' => $data->project->zone->display_code_name,
                ];
            })
            ->unique()
            ->toArray();
        $projectOptions = $canBookActivitySessions
            ->sortBy(['project.zone.code', 'project.id'])
            ->map(function ($data) {
                return [
                    'value' => $data->project->id,
                    'label' => $data->project->display_venue_number_and_name,
                ];
            })
            ->unique()
            ->toArray();
        $sessionTimeOptions = $canBookActivitySessions
            ->sortBy(['start_time', 'end_time'])
            ->map(function ($data) {
                return [
                    'value' => $data->display_time_range,
                    'label' => $data->display_time_range,
                ];
            })
            ->unique()
            ->toArray();

        $canBookActivitySessions = $canBookActivitySessions
            ->map(function ($item) {
                // 這裡可以自由命名 Key 和加工 Value
                return [
                    'activity_session_id' => $item->id,
                    'date' => $item->display_date_for_datepicker,
                    'zone_id' => $item->project->zone->id,
                    'project_id' => $item->project->id,
                    'time_range' => $item->display_time_range,
                    'quota_min' => $item->quota_min,
                    'quota_max' => $item->quota_max,
                ];
            })
            ->toArray();

        $reservationFormData = [
            'currentProject' => $activitySessions->first()->project,
            'canBookActivitySessions' => $canBookActivitySessions,
            'sessionDateOptions' => $sessionDateOptions,
            'zoneOptions' => $zoneOptions,
            'projectOptions' => $projectOptions,
            'sessionTimeOptions' => $sessionTimeOptions,
        ];

        return view('user.reservation.index', compact(
            'reservationFormData',
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'zone' => 'required|integer|max:50',
                'venue' => 'required|integer|max:50',
                'date' => 'required|string|max:10',
                'time_range' => 'required|string|max:11',
                'activity_session_id' => 'required|exists:activity_sessions,id',
                'contact_name' => 'required|string|max:50',
                'contact_sex' => 'required|integer|between:1,2',
                'contact_phone' => 'required|string|max:50',
                'contact_email' => 'required|email|max:100',
                'contact_group_name' => 'required|string|max:100',
                'participants_quota' => 'required|integer|min:1',
                'notes' => 'nullable|string|max:255',
                'captcha' => 'required|captcha',
            ],
            [
                'zone.required' => __('reservation.form.zone.errMsg'),
                'venue.required' => __('reservation.form.venue.errMsg'),
                'date.required' => __('reservation.form.date.errMsg'),
                'time_range.required' => __('reservation.form.time.errMsg'),
                'contact_name.required' => __('reservation.form.name.errMsg'),
                'contact_phone.required' => __('reservation.form.tel.errMsg'),
                'contact_email.required' => __('reservation.form.email.errMsg'),
                'contact_group_name.required' => __('reservation.form.org.errMsg'),
                'participants_quota.required' => __('reservation.form.count.errMsg'),
                'captcha.required' => __('reservation.form.captcha.errMsg'),
            ]
        );

        $activitySession = ActivitySessionNormal::forFrontendCanBeBook()
            ->find($validated['activity_session_id']);

        if (empty($activitySession)) {
            return redirect()->route('user.reservation.complete')->with([
                'isClosed' => '您預約的場次已結束報名，歡迎再看看其他場次!',
                'linkForm' => route('user.reservation.project', ['id' => $validated['venue']]),
                'showOverviewLink' => request()->query('from') === 'overview',
                'showEventLink' => request()->query('from') === 'event',
            ]);
        }

        if (!$activitySession->can_book) {
            return redirect()->route('user.reservation.complete')->with([
                'isFull' => '您預約的場次名額已滿，歡迎再看看其他場次!',
                'linkForm' => route('user.reservation.project', ['id' => $validated['venue']]),
                'showOverviewLink' => request()->query('from') === 'overview',
                'showEventLink' => request()->query('from') === 'event',
            ]);
        }

        $reservation = new ActivityReservationNormal($validated);
        $reservation->status = ActivityReservationStatus::PENDING;
        $reservation->save();

        $reservation->load([
            'activitySession',
            'activitySession.project',
            'activitySession.project.zone',
        ]);

        MailService::SendMailWhenPendingActivityReservationNormal($reservation);

        return redirect()->route('user.reservation.complete')->with([
            'isSuccess' => '預約成功!',
            'linkForm' => route('user.reservation.project', ['id' => $validated['venue']]),
            'showOverviewLink' => request()->query('from') === 'overview',
            'showEventLink' => request()->query('from') === 'event',
        ]);
    }

    private static function getEmptyFormData($currentProjectId)
    {
        $reservationFormData = [
            'currentProject' => [],
            'canBookActivitySessions' => [],
            'sessionDateOptions' => [],
            'zoneOptions' => [],
            'projectOptions' => [],
            'sessionTimeOptions' => [],
        ];

        $projects = Project::with('zone')
            ->whereHas('zone', function ($query) {
                $query->where('is_active', true);
            })
            ->where('id', $currentProjectId)
            ->where('is_active', true)
            ->get();

        abort_if($projects->isEmpty(), 404);

        $reservationFormData['currentProject'] = $projects->first();
        $reservationFormData['zoneOptions'] = $projects
            ->sortBy('zone.code')
            ->map(function ($data) {
                return [
                    'value' => $data->zone->id,
                    'label' => $data->zone->display_code_name,
                ];
            })
            ->unique()
            ->toArray();
        $reservationFormData['projectOptions'] = $projects
            ->sortBy(['zone.code', 'id'])
            ->map(function ($data) {
                return [
                    'value' => $data->id,
                    'label' => $data->display_venue_number_and_name,
                ];
            })
            ->unique()
            ->toArray();

        return $reservationFormData;
    }
}
