<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 








<div class="container">
	<div id="messages">

		<div class="msg"><p></p></div>
	
	</div>
	<form>
		@csrf
		<input type="text" id="message" autocomplete="off" autofocus="" placeholder="Type message...">
		<input type="submit" value="Send">
	</form>
</div>


<script>
	var socket = io(':6001');

	 $('form').on('submit', function() {
        var text = $('#message').val(),
        	msg = {message : text};

        socket.send(msg);
        return false;
      });

	 socket.on('message', function(data){
	 	console.log(data)
	 });




</script>