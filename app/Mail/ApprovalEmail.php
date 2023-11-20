<?

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->view('emails.approval')->subject('Pendaftaran Diterima - PMR SMK Telkom Banjarbaru');
    }
}
