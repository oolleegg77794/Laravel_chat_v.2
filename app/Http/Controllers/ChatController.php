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
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class ChatController extends Controller
{

	public function store() {

		$redis = Redis::connection();
		$result = $redis->lrange("Messages", 0, -1);

        $names =[];
        foreach ($result as $name){
            $result_message = json_decode($name);
            array_push($names, $result_message->name);
        }
        $names = array_unique($names);

		return view ('template.content')
		-> with (['data'=>$result])
        -> with (['names'=>$names]);

	}

	public function save(Request $request) {

        $chat = new chat();
        $chat-> name = $request->input('name');
        $chat-> message = $request->input('message');

        $redis = Redis::connection();

        $redis->rpush("Messages", json_encode($chat));

        Redis::publish($chat,'message');

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


/*    public function getMessages(Request $request){

        $lastMessageId = $request->input('lastMessageId');
        $redis = Redis::connection();

        $result = $redis->lrange("Messages", $lastMessageId, -1);

        foreach ($result as $key => $num) {
            $num;
            $key = $key+$lastMessageId;
        };

        $str = explode(",", $num);

        $str_name = explode(":", $str['0']);
        $str_message = explode(":", $str['1']);

        $message = str_replace(['"','}'], '', $str_message);
        $name = str_replace('"','', $str_name);

        $chat = new chat();
        $chat-> name = $name['1'];
        $chat-> message = $message['1'];
        $chat-> id = $key;

        print_r(json_encode($chat));

    }*/
}
