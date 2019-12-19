<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account_roomtype extends Model
{
    //
    protected $table='account_roomtype';
    public $timestamps=false;
    function room_type() {
    	return $this->belongsTo('App\room_type','id_room_type','id');
    }
    function account() {
    	return $this->belongsTo('App\account','id_account','id');	
    }
    function room() {
    	return $this->hasMany('App\room','id_account_roomtype','id');
    }
}
