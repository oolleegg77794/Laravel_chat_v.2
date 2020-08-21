<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Event;

class onSaveMessageEvent extends Event implements ShouldBroadcast
{

    public $chat;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct($chat)
    {
        echo $chat->name;

    }

    public function broadcastOn()
    {
        return new Channel ('chat');
    }

    public function broadcastAs()
    {
        return 'messages';
    }

}
