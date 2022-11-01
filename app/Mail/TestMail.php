<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
     use Queueable, SerializesModels;

     public function build()
     {
         $data = [
             'nama' => 'Johni Revormasi',

         ];
         return $this->from(env('MAIL_FROM_ADDRESS'))
             ->view('mail/test_mail')
             ->with($data);

     }
}
