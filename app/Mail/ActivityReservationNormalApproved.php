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
        return $this->subject("【預約成功通知】2026台東博覽會｜團體導覽預約申請已通過（No.:{$this->reservation->order_number}）")
            ->view('emails.reservation.normal.approved');
    }
}
