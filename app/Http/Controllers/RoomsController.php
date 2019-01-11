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
    	$room = request('room');
    	$messages = Message::where('room_id',$room)->take(15)->latest()->get();
    	return view('show',compact('room','messages'));
    }
}
