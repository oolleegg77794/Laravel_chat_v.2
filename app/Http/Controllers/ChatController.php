<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\onSaveMessageEvent;
use App\Models\chat;
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
		$logFile = file(storage_path().'/logs/Models/model-2020-08-10.log');
		$logCollection = [];
		// Loop through an array, show HTML source as HTML source; and line numbers too.
		foreach ($logFile as $line_num => $line) {
		$logCollection[] = array('line'=> $line_num, 'content'=> htmlspecialchars($line));
		}
		/*dd($logCollection);*/

		foreach ($logCollection as $num) {
			echo $num['content'];
			echo "<p>";
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
