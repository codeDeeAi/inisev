<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserPostEmail extends Mailable
{
    use Queueable, SerializesModels;

    ## Public Variables
    public $title;
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $post)
    {
        $this->title = $title;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.post');
    }
}
