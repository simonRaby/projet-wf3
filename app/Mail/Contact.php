<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $content;
    public $email;
    public $name;
    public $chiefContact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $content, $email, $name, $chiefContact = NULL )
    {
        $this->title = $title;
        $this->content = $content;
        $this->email = $email;
        $this->name = $name;
        $this->chiefContact = $chiefContact;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, $this->name)
            ->subject($this->title)
            ->view('layouts.email-contact')->with([$this->content, $this->chiefContact]);
    }
}
