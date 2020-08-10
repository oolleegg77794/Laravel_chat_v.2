<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Main;

class chat extends Main
{

	protected $table = 'chats';
	public $timestamps = false;
    
}
