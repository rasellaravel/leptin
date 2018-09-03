<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Session;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $userInfo = Session::get('billing');
        $subject = 'Leptin.lt Product Buy Info';
        $send = $this->view('front-end.invoice-mail')->subject($subject)->to($userInfo['email']);
        $send = $this->view('front-end.invoice-mail')->subject($subject)->to('paklausti@gmail.com');
        return $send;
    }
}
