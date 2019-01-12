<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;
use Chat\User;
use Chat\Message;

class MessagesController extends Controller
{
    public function store()
    {
    	$message = request('message');
    	$room 	 = request('room');
    	$name	 = request('name');
    	$user = User::where('name',$name)->first();
    	Message::Create([
    		'room_id' => $room,
    		'content' => str_replace("%"," ",$message),
    		'user_id' => $user->id,
    	]);
    }
}
