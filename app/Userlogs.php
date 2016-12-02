<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlogs extends Model
{
    protected $fillable = [
        'users_id','email', 'logdate','timeIn','timeOut'
    ];

    /**
    A userlog belongs to a User
    */
    public function user()
    {
    	return $this->belongsTo('App\Users');
    }

    /**
    A userlog belongs to Users
    */
    /*public function users()
    {
    	return $this->belongsTo('App\User');
    }*/
}
