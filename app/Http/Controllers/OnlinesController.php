<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;
use Chat\Online;
use Chat\User;

class OnlinesController extends Controller
{
    public function get()
    {
    	$room = request('room');
    	$onlines = Online::where('room_id',$room)->get();
    	return view('ajax.online',compact('onlines'));
    }
    public function update()
    {
    	Online::where('updated_at','<',\Carbon\Carbon::now()->subSeconds(120)->toDateTimeString())->delete();
    }
}
