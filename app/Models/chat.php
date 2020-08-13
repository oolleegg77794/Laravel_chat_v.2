<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LogTrait;
use App\Events\onSaveMessageEvent;


class chat extends Model
{
	use LogTrait;
	protected $table = 'chats';
	public $timestamps = false;
    
}
