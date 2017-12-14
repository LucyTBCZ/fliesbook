<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
    	'user_id', 'friend_id', 'status'
    ];

    public function user() {
    	return $this->hasOne('App\User', 'id', 'friend_id');
    }

    public function friend() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
