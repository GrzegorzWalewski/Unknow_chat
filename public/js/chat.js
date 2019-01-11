var messages = document.getElementById('messages');
var roomId = document.getElementById('room_name').innerText;
var username = document.getElementById('username').innerText;
var submitButton = document.getElementById('send');
var onlineSchedule = "";
if(messages.children.length>=1)
{
	var lastMessageId = messages.children[messages.children.length-1].children[0].id;
	var myVar = setInterval(function(){
	lastMessageId = messages.children[messages.children.length-1].children[0].id;
	roomId = document.getElementById('room_name').innerText;
 	getNewMessages(lastMessageId, roomId); 
	}, 1000);
}

submitButton.onclick = function(){setOnline(username)};
window.onload = function(){setOnline(username)};
function getNewMessages(lastMessageId, roomId)
{
  	$.ajax({url: "/new?room="+roomId+"&message="+lastMessageId, success: function(result){
      messages.innerHTML+=result;
    }});
}
function setOffline(roomId)
{
	$.ajax({url: "/setoffline?room="+roomId});
}
function setOnline(username)
{
	clearTimeout(onlineSchedule);
	$.ajax({url: "/setonline?name="+username+"&room="+roomId});
	onlineSchedule = setTimeout(function(){ setOffline(roomId) }, 120000);
}