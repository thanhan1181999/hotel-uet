<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_type';
    public $primaryKey = 'id_room_type';
    public $timestamps = false;
}
