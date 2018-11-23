<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['room_id','name'];
}
