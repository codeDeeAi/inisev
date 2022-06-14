<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MailUsersEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    ## Public Variables
    public $tenant_id;
    public $title;
    public $post;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($tenant_id, $title, $post)
    {
        $this->tenant_id = $tenant_id;
        $this->title = $title;
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
