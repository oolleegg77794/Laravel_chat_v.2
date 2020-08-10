@extends('main')
@section('content')

<div class="container">
	<div id="messages">
	@foreach($data as $el)
		<div class="msg" msgId="{{$el->id}}"><p>{{$el->name}}</p>{{$el->message}}</div>
	@endforeach		
	</div>
	<form method="POST">
		@csrf
		<input type="text" id="message" autocomplete="off" autofocus="" placeholder="Type message...">
		<input type="submit" value="Send">
	</form>
</div>



@endsection


