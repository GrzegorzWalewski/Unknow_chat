<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;
use Chat\Room;
use Chat\User;
use Chat\Message;
use Chat\Online;

class RoomsController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }
    public function store(Request $request)
    {
    	$request->validate([
    		'room_id' => 'required|max:20',
    		'name'	  => 'required|min:3|max:15'
    	]);
    	if(Room::where('id',request('room_id'))->count()!=1)
    	{
    		Room::Create([
    			'id' => request('room_id')
    		]);
    	}
    	if(User::where('name',request('name'))->count()!=1)
    	{
    		User::Create([
    				'name'=>request('name')
    		]);
    	}
    	User::login(request('name'));
    	return redirect('/chat?room='.request('room_id'));
    }
    public function show()
    {
    	$room = Room::where('id',request('room'))->first();
    	$messages = Message::where('room_id',request('room'))->latest()->take(15)->get();
        $messages = $messages->reverse();
    	return view('show',compact('room','messages'));
    }
    public function get_new()//get new messages if there are any (for ajax)
    {
        $room = request('room');
        $message = request('message');
        $messages = Message::where('room_id',$room)->where('id',">",$message)->latest()->get();
        if($messages->first())
        {
            return view('ajax.new',compact('messages'));
        }
    }
    public function setOnline()
    {
        $nick = request('name');
        $room = request('room');
        Online::setOnline($nick,$room);
    }
    public function setOffline()
    {
        $room = request('room');
        Online::setOffline($room);
    }
}
