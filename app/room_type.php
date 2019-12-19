<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_type extends Model
{
    //
    protected $table='room_type';
    public $timestamps=false;
    function image_room() {
    	return $this->hasMany('App\image_room','id_room_type','id');
    }
    function quyenloi_room() {
    	return $this->hasMany('App\quyenloi_room','id_room_type','id');
    }
    function service_room() {
    	return $this->hasMany('App\service_room','id_room_type','id');
    }
    function room() {
    	return $this->hasMany('App\room','id_room_type','id');
    }
    function account_roomtype() {
        return $this->hasMany('App\account_roomtype','id_room_type','id');
    }
}
