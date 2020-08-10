<?php

namespace App\Observers;

use App\Models\Main;
use Log;

class MainObserver
{
    /**
     * Handle the main "created" event.
     *
     * @param  \App\Main  $main
     * @return void
     */
    public function created(Main $main)
    {
        //
        log::info('Data save in DataBase', [$main['name'], $main['message']]);
    }

    /**
     * Handle the main "updated" event.
     *
     * @param  \App\Main  $main
     * @return void
     */
    public function updated(Main $main)
    {
        //
    }

    /**
     * Handle the main "deleted" event.
     *
     * @param  \App\Main  $main
     * @return void
     */
    public function deleted(Main $main)
    {
        //
    }

    /**
     * Handle the main "restored" event.
     *
     * @param  \App\Main  $main
     * @return void
     */
    public function restored(Main $main)
    {
        //
    }

    /**
     * Handle the main "force deleted" event.
     *
     * @param  \App\Main  $main
     * @return void
     */
    public function forceDeleted(Main $main)
    {
        //
    }
}
