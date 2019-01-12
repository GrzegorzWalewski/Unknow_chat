var messages = document.getElementById('messages');
var roomId = document.getElementById('room_name').innerText;
var username = document.getElementById('username').innerText;
username = username.replace(" ", "");
var userStatus = document.getElementById('status');
var submitButton = document.getElementById('send');
var message_div = document.getElementById('message_div');
var online_list = document.getElementById('online_list');
var onlineSchedule = "";
var message = "";
//setting user online on load
window.onload = function(){
	setOnline(username);
};
//sending messages on enter press
document.getElementById('input').addEventListener("keyup", function(event) {
  event.preventDefault();
  if (event.keyCode === 13) {
    submitButton.click();
    message = document.getElementById('input').value;
  }
});
//update message input
$( "#input" ).keyup(function(){
	message = document.getElementById('input').value;
});
//if there are messages then getting newer
if(messages.children.length>=1)
{
	var lastMessageId = messages.children[messages.children.length-1].children[0].id;
	var myVar = setInterval(function(){
	lastMessageId = messages.children[messages.children.length-1].children[0].id;
	roomId = document.getElementById('room_name').innerText;
 	getNewMessages(lastMessageId, roomId); 
	}, 1000);
	submitButton.onclick = function(e){
		if(message=="")
		{
			e.preventDefault();
		}
		else
		{
			sendMessage(username, message, roomId, lastMessageId);
		}
		message = document.getElementById('input').value;
	};
}
else
{
	submitButton.onclick = function(e){
		if(message=="")
		{
			e.preventDefault();
		}
		else
		{
			sendMessage(username, message, roomId, 0);
		}
		message = document.getElementById('input').value;
	};
}
function getNewMessages(lastMessageId, roomId)
{
	//Get new messages and scroll to bottom
  	$.ajax({url: "/new?room="+roomId+"&message="+lastMessageId, success: function(result){
	    if(result!="")
	    {
	      messages.innerHTML+=result;
	      scrollToBottom();
	    }
    }});
    //Get online list
    $.ajax({url: "/get?room="+roomId, success: function(result){
    	online_list.innerHTML = result;
    }});
    //clear status list
    clearStatusList();
}
function setOffline(roomId)
{
	//change user status to offline after 2min
	$.ajax({url: "/setoffline?room="+roomId});
	userStatus.classList+=" offline";
}
function setOnline(username)
{
	//set user status online for 2min
	clearTimeout(onlineSchedule);
	$.ajax({url: "/setonline?name="+username+"&room="+roomId});
	onlineSchedule = setTimeout(function(){ setOffline(roomId) }, 120000);
}
function sendMessage(username, message, roomId, lastMessageId)
{
	//sending messages, setting user status online, getting new messages
	setOnline(username);
	message = message.replace(" ", "%");
	document.getElementById('input').value = "";
	$.ajax({url: "/store?name="+username+"&room="+roomId+"&message="+message});
	getNewMessages(lastMessageId,roomId);
}
function scrollToBottom(){ //scroll to bottom
   message_div.scrollTop = message_div.scrollHeight - message_div.clientHeight;
}
//
function clearStatusList()
{
	$.ajax({url: "/update"});
}