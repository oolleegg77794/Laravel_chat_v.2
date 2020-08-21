<?php

namespace App\Listeners;

use App\Events\onSaveMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
class SaveMessageListener
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
     * @param  onSaveMessageEvent  $event
     * @return void
     */
    public function handle(onSaveMessageEvent $event)
    {


    }
}
