<?php

namespace App\Listeners;

use App\Events\MailUsersEvent;
use App\Mail\NewUserPostEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MailUsersEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MailUsersEvent $event)
    {
        // Get all users
        $users = User::where('tenant_id', $event->tenant_id)->select('email')->get();
        // Send Email to users
        foreach ($users as $user) {
            Mail::to($user->email)->send(new NewUserPostEmail($event->title, $event->post));
        }
    }
}
