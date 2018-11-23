<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;
use Chat\Room;
use Chat\User;
use Chat\Message;

class RoomsController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }
    public function store(Request $request)
    {
    	$request->validate([
    		'room_id' => 'required',
    		'name'	  => 'required|min:3|max:15'
    	]);
    	if(Room::where('name',request('room_id'))->count()!=1)
    	{
    		Room::Create([
    			'name' => request('room_id')
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
    	$room = request('room');
    	$roomData = Room::where('name',$room)->first();
    	$messages = Message::where('room_id',$roomData->id)->take(15)->latest()->get();
    	return view('show',compact('roomData','messages'));
    }
}
