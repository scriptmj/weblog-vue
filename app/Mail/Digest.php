<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Digest extends Mailable
{
    use Queueable, SerializesModels;
    public $posts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($posts, $user, $premiumposts){
        $this->posts = $posts;
        $this->user = $user;
        $this->premiumposts = $premiumposts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.digestmail')->with(['posts' => $this->posts, 'user' => $this->user, 'premiumposts' => $this->premiumposts]);
    }
}
