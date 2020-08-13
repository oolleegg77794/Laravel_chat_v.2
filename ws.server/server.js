/*var io = require('socket.io')(6001);

io.on('connection', function(socket){

	console.log('New connection:', socket.id);

	socket.on('message', function(data){
		socket.broadcast.send(data);
	});


});*/





var Redis = require('ioredis');
    redis = new Redis(); 


redis.on('connect', function() {
    console.log('connected');
});

redis.subscribe('*', function(error, count){

});

redis.on('message', function(channel, message){
    console.log(channel, message);
});







/*
redis.psubscribe('*', function(err, count) {});

redis.on('pmessage', function(subscribed, channel, message) {
    console.log(channel);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});
*/






/*
client.on("error", function (err) {
  console.log("Error: " + err);
});

// Попробуем записать и прочитать
client.set('myKey', 'Hello Redis', function (err, repl) {
    if (err) {
           // Оо что то случилось при записи
           console.log('Что то случилось при записи: ' + err);
           client.quit();
    } else {
           // Прочтем записанное
           client.get('myKey', function (err, repl) {
                   //Закрываем соединение, так как нам оно больше не нужно
                   client.quit();
                   if (err) {
                           console.log('Что то случилось при чтении: ' + err);
                   } else if (repl) {
                   // Ключ найден
                           console.log('Ключ: ' + repl);
               } else {
                   // Ключ ненайден
                   console.log('Ключ ненайден.')

           };
           });
    };
});*/