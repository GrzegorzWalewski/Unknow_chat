<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    protected $fillable = ['user_id','room_id','id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function setOnline($name,$room)
    {
        $user = User::where('name',$name)->first();
        if(!Online::where('user_id',$user->id)->where('room_id',$room)->first())
        {
            Online::Create([
            'user_id' => $user->id,
            'room_id' => $room
            ]);
        }
        else
        {
            $update = Online::where('room_id',$room)->where('user_id',$user->id)->first();
            $update->touch();
        }
    }
    public static function setOffline($room)
    {
        $user = User::where('name',session('username'))->first();
        Online::where('user_id',$user->id)->where('room_id',$room)->delete();
    }
}
