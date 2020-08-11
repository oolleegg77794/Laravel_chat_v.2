<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use App\Observers\LogObserver;

trait LogTrait {

    public static function bootLogTrait()
	{
    static::observe(LogObserver::class);	
	}
} 