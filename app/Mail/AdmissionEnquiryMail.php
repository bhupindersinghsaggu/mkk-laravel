<?php

namespace App\Mail;

use App\Models\Admission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdmissionEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $admission;

    public function __construct(Admission $admission)
    {
        $this->admission = $admission;
    }

    public function build()
    {
        return $this->subject('New Admission Enquiry Received')
                    ->view('emails.admission');
    }
}
