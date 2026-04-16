<?php

namespace App\Http\Controllers\User;

use App\Enums\ActivityReservationStatus;
use App\Http\Controllers\Controller;
use App\Models\ActivityReservation;
use App\Models\ActivityReservationNormal;
use App\Models\ActivitySessionNormal;

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
                    'label' => $data->project->display_venue_number,
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
            ->whereHas('project', function ($query) {
                $query->where('is_active', true);
            })
            ->whereHas('project.zone', function ($query) {
                $query->where('is_active', true);
            })
            ->where('is_active', true)
            ->where('project_id', $currentProjectId)
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
                    'label' => $data->project->display_venue_number,
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
        $validated = $request->validate([
            'activity_session_id' => 'required|exists:activity_sessions,id',
            'contact_name' => 'required|string|max:50',
            'contact_sex' => 'required|integer|max:1',
            'contact_phone' => 'required|string|max:50',
            'contact_email' => 'required|email|max:100',
            'contact_group_name' => 'required|string|max:100',
            'participants_quota' => 'required|integer|min:1',
            'status_notes' => 'nullable|string',
        ]);

        $activitySession = ActivitySessionNormal::find($validated['activity_session_id']);

        if (!$activitySession->can_book) {
            return redirect()->route('user.reservation.complete')->with('fail', '預約已滿!');
        }

        $reservation = new ActivityReservationNormal($validated);
        $reservation->status = ActivityReservationStatus::PENDING;
        $reservation->save();

        return redirect()->route('user.reservation.complete')->with('success', '預約成功!');
    }
}
