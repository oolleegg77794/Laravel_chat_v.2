@extends('main')
@section('content_soket')

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>




<div class="container">
	<div id="messages">
	
	</div>
	<form method="POST" action="/saveindex">
		@csrf
		<input type="text" id="message" name= "message" autocomplete="off" autofocus="" placeholder="Type message...">
		<input type="submit" value="Send">
	</form>
</div>



@endsection


