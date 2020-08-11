<?php

namespace App\Observers;

use Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LogObserver
{
    /**
     * Handle the chat "created" event.
     *
     * @param  \App\chat  $chat
     * @return void
     */
    public function created(Model $Model)
    {
        //
        log::info('Data save in DataBase', [$Model['name'], $Model['message']]);

        $class_name = get_class($Model);

        $model_name = substr("$class_name", 11).'.log';

        $time = Carbon::now();
        
        $time = str_replace(":", " ", "$time");

        $exists = Storage::disk('local')->exists('chat.log');

        $msg = $time .' | '.'NAME - '. $Model['name'] .' | '.'MESSAGE - '. $Model['message'] .' | '.'CREATED' .$exists ;

        if ($exists==true) {
            Storage::put('logs/Models/'.'_'. $model_name , $msg);
        }

        Storage::append("logs/Models/$model_name", "$msg");

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
