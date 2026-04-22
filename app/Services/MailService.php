<?php

namespace App\Services;

use App\Enums\ActivityReservationStatus;
use App\Mail\ActivityReservationApproved;
use App\Mail\ActivityReservationVipCreated;
use App\Models\ActivityReservation;
use App\Models\ActivityReservationNormal;
use App\Models\ActivityReservationVip;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;


class MailService
{
    /**
     * @param Model|null $activityReservation
     * @return void
     */
    public static function SendMailWhenPendingActivityReservationNormal(?Model $activityReservation): void
    {
        if ($activityReservation->status !== ActivityReservationStatus::PENDING) {
            return;
        }

        $projectId = $activityReservation->activitySession->project->id;

        $bccMails = User::role('venue_reservation_system_admin')
            ->where('project_id', $projectId)
            ->pluck('email')
            ->unique()
            ->toArray();

        Mail::to($activityReservation->contact_email)
            ->bcc($bccMails ?? [])
            ->send(new \App\Mail\ActivityReservationNormalPending($activityReservation));
    }

    /**
     * @param Model|null $activityReservation
     * @return void
     */
    public static function SendMailWhenApprovedActivityReservationNormal(?Model $activityReservation): void
    {
        if ($activityReservation->status !== ActivityReservationStatus::CONFIRMED) {
            return;
        }

        $projectId = $activityReservation->activitySession->project->id;

        $bccMails = User::role('venue_reservation_system_admin')
            ->where('project_id', $projectId)
            ->pluck('email')
            ->unique()
            ->toArray();

        Mail::to($activityReservation->contact_email)
            ->bcc($bccMails ?? [])
            ->send(new \App\Mail\ActivityReservationNormalApproved($activityReservation));
    }

    /**
     * @param Model|null $activityReservation
     * @return void
     */
    public static function SendMailWhenRejectActivityReservationNormal(?Model $activityReservation): void
    {
        if ($activityReservation->status !== ActivityReservationStatus::CANCELLED) {
            return;
        }

        $projectId = $activityReservation->activitySession->project->id;

        $bccMails = User::role('venue_reservation_system_admin')
            ->where('project_id', $projectId)
            ->pluck('email')
            ->unique()
            ->toArray();

        // 可以在此執行寄信邏輯
        Mail::to($activityReservation->contact_email)
            ->bcc($bccMails ?? [])
            ->send(new \App\Mail\ActivityReservationNormalRejected($activityReservation));
    }

    /**
     * @param Model|null $activityReservation
     * @return void
     */
    public static function SendMailInternalActivityReservationVip(?Model $activityReservation): void
    {
        if ($activityReservation->status !== ActivityReservationStatus::CONFIRMED) {
            return;
        }

        $projectId = $activityReservation->activitySession->project->id;

        // 1. 抓取全域管理員
        $bccMails = User::role('reservation_system_admin')->pluck('email');

        // 2. 合併專案管理員
        $bccMails = User::role('venue_reservation_system_admin')
            ->where('project_id', $projectId)
            ->pluck('email')
            // 合併
            ->concat($bccMails)
            // 去重複
            ->unique()
            // 轉為陣列給 Mail 寄出
            ->toArray();

        Mail::to($activityReservation->guide_leader_email)
            ->bcc($bccMails ?? [])
            ->send(new ActivityReservationVipCreated($activityReservation));
    }

    /**
     * @param Model|null $activityReservation
     * @return void
     */
    public static function SendMailExternalActivityReservationVip(?Model $activityReservation): void
    {
        if ($activityReservation->status !== ActivityReservationStatus::CONFIRMED) {
            return;
        }

        Mail::to($activityReservation->contact_email)
            ->send(new ActivityReservationVipCreated($activityReservation));
    }

}
