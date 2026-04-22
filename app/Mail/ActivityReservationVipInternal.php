<?php

namespace App\Mail;

use App\Models\ActivityReservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivityReservationVipInternal extends Mailable
{
    use Queueable, SerializesModels;

    public ActivityReservation $reservation;

    public function __construct(ActivityReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->subject("2026台東博覽會｜貴賓導覽預約確認（No.:{$this->reservation->order_number}）")
            ->view('emails.reservation.vip.internal');
    }
}
