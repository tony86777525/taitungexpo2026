<?php

namespace App\Http\Controllers;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Models\ActivityReservation;
use App\Models\ActivitySession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityReservationController extends Controller
{
    /**
     * @param integer $sessionId
     * @return View|string
     */
    public function create(int $sessionId)
    {
        $activitySession = ActivitySession::query()
            ->with([
                'activity',
                'activity.project',
                'activity.project.zone',
                'activityReservations' => function ($query) {
                    $query
                        ->where('status', '!=', ActivityReservationStatus::CANCELLED)
                        ->where('type', ActivityReservationType::NORMAL);
                },
            ])
            ->where('id', $sessionId)
            ->first();

        $url = route('activity.index');
        if (!isset($activitySession)) {
            return "找不到場次<br><a href=\"{$url}\">返回</a>";
        }
        if (Carbon::now()->gt($activitySession->date)) {
            return "場次已過期<br><a href=\"{$url}\">返回</a>";
        }

        $normalGroupCount = $activitySession->activityReservations->count();

        if (!$activitySession->canBookNormalGroup($normalGroupCount)) {
            return "場次預約已滿<br><a href=\"{$url}\">返回</a>";
        }

        return view('user.activity_reservation.form', compact('activitySession'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_session_id' => 'required|exists:activity_sessions,id',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_group_name' => 'required|string|max:255',
            'participants_quota' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'type' => 'required|in:1'
        ]);

        $activitySession = ActivitySession::find($validated['activity_session_id']);
        $normal_group_count = $activitySession->activityReservations->where('type', ActivityReservationType::NORMAL)->count();

        if (!$activitySession->canBookNormalGroup($normal_group_count)) {
            return redirect()->route('activity.index')->with('success', '預約已滿');
        }

        $reservation = new ActivityReservation($validated);
        $reservation->status = ActivityReservationStatus::PENDING;
        $reservation->save();

        return redirect()->route('activity.index')->with('success', 'Reservation submitted successfully!');
    }
}
