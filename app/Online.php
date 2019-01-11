<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    protected $fillable = ['userid','roomid'];
    public static function setOnline($name,$room)
    {
        $user = User::where('name',$name)->first();
        if(!Online::where('userid',$user->id)->where('roomid',$room)->first())
        {
            Online::Create([
            'userid' => $user->id,
            'roomid' => $room
            ]);
        }
    }
    public static function setOffline($room)
    {
        $user = User::where('name',session('username'))->first();
        Online::where('userid',$user->id)->where('roomid',$room)->delete();
    }
}
