<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    //
    protected $table='account';
    public $timestamps=false;
    function account_roomtype() {
    	return $this->hasMany('App\account_roomtype','id_account','id');
    }
}
