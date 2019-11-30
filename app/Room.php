<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'room';
    public $primaryKey = 'room_no';
    public $timestamps = false;
}
