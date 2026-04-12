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
     * @param ActivityReservation $activityReservation
     * @return void
     */
    public static function SendMailWhenApproveActivityReservation(ActivityReservation $activityReservation): void
    {
        if ($activityReservation->status === ActivityReservationStatus::PENDING) {
            return;
        }

        $activityReservation->load([
            'activitySession',
            'activitySession.activity',
            'activitySession.activity.project',
            'activitySession.activity.project.zone',
        ]);

        if ($activityReservation->status === ActivityReservationStatus::CONFIRMED) {
            $subject = "【預約審核結果通知】2026台東博覽會｜團體導覽申請已通過（預約編號：{$activityReservation->id}）";
        } else {
            $subject = "【預約審核結果通知】2026台東博覽會｜團體導覽申請未通過（預約編號：{$activityReservation->id}）";
        }

        // 可以在此執行寄信邏輯
        Mail::to($activityReservation->contact_email)->send(new \App\Mail\ActivityReservationConfirmation($activityReservation, $subject));
    }

    /**
     * @param Model|null $activityReservation
     * @return void
     */
    public static function SendMailWhenApproveActivityReservationNormal(?Model $activityReservation): void
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
            ->bcc($bccMails)
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
            ->bcc($bccMails)
            ->send(new \App\Mail\ActivityReservationNormalRejected($activityReservation));
    }

    /**
     * @param Model|null $activityReservation
     * @return void
     */
    public static function SendMailWhenCreateActivityReservationVip(?Model $activityReservation): void
    {
        if ($activityReservation->status !== ActivityReservationStatus::CANCELLED) {
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

        Mail::to($activityReservation->contact_email)
            ->bcc($bccMails)
            ->send(new ActivityReservationVipCreated($activityReservation));
    }
}
