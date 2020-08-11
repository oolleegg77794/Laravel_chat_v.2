<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LogTrait;

class test1 extends Model
{
    //
	use LogTrait;
	protected $table = 'chats';
	public $timestamps = false;
}
