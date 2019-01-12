<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = ['content', 'room_id', 'user_id'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
