<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['id'];
    public $incrementing = false;
    public function online()
    {
    	return $this->hasMany(Online::class);
    }
}
