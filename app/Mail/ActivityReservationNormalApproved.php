<?php

namespace App\Mail;

use App\Models\ActivityReservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivityReservationNormalApproved extends Mailable
{
    use Queueable, SerializesModels;

    public ActivityReservation $reservation;

    public function __construct(ActivityReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->subject("【預約審核結果通知】2026台東博覽會｜團體導覽申請已通過（預約編號：{$this->reservation->order_number}）")
            ->view('emails.activity-reservation-normal-approved');
    }
}
