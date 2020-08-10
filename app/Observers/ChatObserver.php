<?php

namespace App\Observers;

use App\Models\chat;
use Log;

class ChatObserver
{
    /**
     * Handle the chat "created" event.
     *
     * @param  \App\chat  $chat
     * @return void
     */
    public function created(chat $chat)
    {
        //
        log::info('Data save in DataBase', [$chat['name'], $chat['message']]);
    }

    /**
     * Handle the chat "updated" event.
     *
     * @param  \App\chat  $chat
     * @return void
     */
    public function updated(chat $chat)
    {
        //

    }

    /**
     * Handle the chat "deleted" event.
     *
     * @param  \App\chat  $chat
     * @return void
     */
    public function deleted(chat $chat)
    {
        //
    }

    /**
     * Handle the chat "restored" event.
     *
     * @param  \App\chat  $chat
     * @return void
     */
    public function restored(chat $chat)
    {
        //
    }

    /**
     * Handle the chat "force deleted" event.
     *
     * @param  \App\chat  $chat
     * @return void
     */
    public function forceDeleted(chat $chat)
    {
        //
    }
}
