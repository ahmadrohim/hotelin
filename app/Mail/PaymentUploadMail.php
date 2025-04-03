<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentUploadMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     *
     * @param $booking
     * @return void
     */
    public function __construct($booking)
    {
        // Assign ke properti $booking
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Konfirmasi Pembayaran Hotelin')
                    ->view('user.emails.payment_upload')
                    ->with([
                        'booking' => $this->booking,
                        'paymentLink' => url('/booking/edit/' . $this->booking->code_booking)
                    ]);
    }
}

