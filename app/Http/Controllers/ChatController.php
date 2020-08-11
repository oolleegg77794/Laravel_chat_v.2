<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\onSaveMessageEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\chat;
use App\Models\test1;
use Event;

class ChatController extends Controller
{
    
	public function store() {
		
		$result = DB::table('chats')->get();
		$users = DB::table('chats')
				->select('name')
				->groupBy('name')
				->get();
		
		return view ('template.content') 
		-> with (['data'=>$result])
		-> with (['users'=>$users]);	

	}

	public function getLog(){

		$files = Storage::allfiles('/logs');

		foreach ($files as $log) {

			echo $log;
			echo "<p>";
			echo "<br>";
			$logfile = file(storage_path().'/app/'. $log);

			$logCollection = [];
			
			foreach ($logfile as $line_num => $line) {
			$logCollection[] = array('line'=> $line_num, 'content'=> htmlspecialchars($line));
			}

			foreach ($logCollection as $num) {
				echo $num['content'];
				echo "<p>";
			}
		}	
	}


	public function getMessages(Request $request){
		$lastMessageId = $request->input('lastMessageId');
		$result = DB::table('chats')->where('id', '>', $lastMessageId)->get();
		print_r(json_encode($result));
	}

	public function save(Request $request) {

		$chat = new chat();
		$chat->name = $request->input('name');
		$chat->message = $request->input('message');
		$chat-> save();
		
	}

}
