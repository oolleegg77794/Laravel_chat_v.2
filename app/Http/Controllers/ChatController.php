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
use Illuminate\Support\Facades\Redis;


class ChatController extends Controller
{
   

	public function index() {

		$result = DB::table('chats')->get();	

		event(
			new \App\Events\onSaveMessageEvent('goooooo')
		);

		return view ('template.content_soket')
		-> with (['data'=>$result]); 
	}

	public function saveIndex(Request $request) {
		

		$chat = new chat();
		$chat->name = "TestName";
		$chat->message = $request->input('message');
		$chat-> save();
		event(
			new \App\Events\onSaveMessageEvent($chat)
		);
		
	}



	public function store() {
		
	/*$result = DB::table('chats')->get();*/
		$users = DB::table('chats')
				->select('name')
				->groupBy('name')
				->get();

		$redis = Redis::connection();

		$result = $redis->lrange("Messages", 16, -1);

		return view ('template.content') 
		-> with (['data'=>$result])
		-> with (['users'=>$users]);	


	}

	
	public function getMessages(Request $request){
		$lastMessageId = $request->input('lastMessageId');
		/*$result = DB::table('chats')->where('id', '>', $lastMessageId)->get();*/
		
		$redis = Redis::connection();
		$result = $redis->lrange("Messages", $lastMessageId, -1);



		foreach ($result as $num) {
			$num;
		}	
			$str = explode(",", $num);	
			$str_name = $str['0'];
			$str_message = $str['1'];
			$str_id = $str['2'];
			$str_name = explode(":", $str_name);
			$str_message = explode(":", $str_message);
			$str_id = explode(":", $str_id);

				

		$chat = new chat();
		$chat->id = $str_id['1'];
		$chat->name = $str_name['1'];
		$chat->message = $str_message['1'];

		print_r(json_encode($chat));
	}

	public function save(Request $request) {

/*		$chat = new chat();
		$chat->name = $request->input('name');
		$chat->message = $request->input('message');
		$chat-> save();*/

		$redis = Redis::connection();
		$message_id = Redis::lindex("Messages", -1);
		$id = json_decode($message_id);
		$num = $id->id;
		$idd = $num + 1;




		$redis->rpush("Messages", json_encode(array('name' => $request->input('name'), 
                                              'message' => $request->input('message'),
                                              'id' => $idd
                                              )
                                       ));

/*        $message = [
          'name' => $request->input('name'),
          'message' => $request->input('message')
      	];

	    
	    $json = json_encode($message);
	    $redis_key = 'msg_' . md5($json);
	    
	    app('redis')->rpush($redis_key, $json);*/


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
				$logCollection[] = array(
					'line'=> $line_num, 
					'content'=> htmlspecialchars($line));
			}

			foreach ($logCollection as $num) {
				echo $num['content'];
				echo "<p>";
			}
		}	
	}

	public function soket_test() {

		return view ('template.content_soket_test'); 

	}	

}
