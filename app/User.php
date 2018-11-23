<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $fillable = ['name'];

    public static function login($name)
    {
    	$user = User::where('name',$name)->get();
    	session(['username' => $user[0]->name]);
    	session(['user_id' => $user[0]->id]);
    }
    public static function logout(Request $request)
    {
    	$request->session()->flush();
    }
}
