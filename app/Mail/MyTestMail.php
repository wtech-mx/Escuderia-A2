<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $users = User::where('id','=',auth()->user()->id)
        ->get();
        $user = User::where('id','=',auth()->user()->id)
        ->first();

        return $this->subject('Correo para '.$user->name)
                    ->view('emails.myTestMail', compact('users'));
    }
}
