$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    $('#messages').animate({scrollTop:$('#messages')[0].scrollHeight});
    name = prompt("Please enter your name");
    if (name != '') {getNotification();}
    $('form').submit(function(e){
    e.preventDefault();
    message = $('#message').val();
    $.ajax({
      type:"POST",
      url: "/sendMessage",
      data:  {message:message, name:name},
      success: function(data){
        $('#message').val('');
      }
    })
    })

    var socket = io(':6001');
    socket.on('*', function(message) {
        message =  message.replace(/name/g,'').replace(/message/g,'')
            .replace(/"/g,'').replace(/}/g,'').replace(/{/g,'').replace(/:/g,'').slice(17);
        var arraymessage = message.split(',');
        console.log(message)
        renderMessage(arraymessage)
    });

    function renderMessage(arraymessage){
        $('#messages').append('<div class="msg"><p>' + arraymessage[0] + '</p>' + arraymessage[1] + '</div>');
        $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
    }

    function getNotification(){
        $('#messages').append('<div class="alert alert-primary" role="alert">User '+name+' entered  chat</div>');
    }

})











/*
$(document).ready(function(){
  getNewMessages();
});

function getNewMessages(){
  let lastMessageId = $('.msg').last().attr('msgid');
  try{
    $.ajax({
      url: '/chat/getMessages',
      data: {
        lastMessageId: lastMessageId
      },
      type: 'GET',
      success: function(response){
        response = JSON.parse(response);
        value = response;
        if (lastMessageId < value.id) {
            $('#messages').append('<div class="msg" msgId="' + value.id + '"><p>' + value.name + '</p>' + value.message + '</div>');
            $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
        }
        console.log(response);
        setTimeout(getNewMessages, 2000);
      }
    })
  }catch(e){
    setTimeout(getNewMessages, 2000);
  }
}*/







