@extends('main')
@section('content')

<?php
		/*$redis = Redis::connection();
		$id = $redis->rpop("Messages");
		$idd = json_decode($id);
		echo $idd->id;*/

?>

<div class="container">
	<div id="messages">
	
	@foreach($data as $el)
		<?php $result = json_decode($el); ?>
		<div class="msg" msgId="<?php echo $result->id; ?>"><p><?php echo $result->name; ?></p><?php echo $result->message; ?></div>
	@endforeach		
	
	</div>
	<form method="POST">
		@csrf
		<input type="text" id="message" name= "message" autocomplete="off" autofocus="" placeholder="Type message...">
		<input type="submit" value="Send">
	</form>
</div>



@endsection


