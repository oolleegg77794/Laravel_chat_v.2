<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use App\Observers\ChatObserver;
use App\Models\chat;

trait ModelLog {

    protected static  function boot()
    {
        parent::boot();
        chat::observe(ChatObserver::class);
    }


} 