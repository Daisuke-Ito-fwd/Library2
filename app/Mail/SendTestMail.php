<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $userMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userMail)
    {
        //
        $this->userMail=$userMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.finAddAcount')
                ->from('test@example.net','Test')
                ->subject('アカウント登録が完了しました。')
                ->with(['userMail' => $this->userMail]);
    }
}
