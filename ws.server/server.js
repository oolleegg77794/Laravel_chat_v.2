var io = require('socket.io')(6001),
    Redis = require('ioredis'),
    redis = new Redis();

redis.on('connect', function() {
    console.log('connected');
});

redis.psubscribe('*', function(){
});

redis.on('pmessage', function(channel, message){
    console.log(message);
    io.emit(channel, message);
});





