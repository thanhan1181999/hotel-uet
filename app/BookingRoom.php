<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    protected $table = 'booking_room';
    public $primaryKey = 'id_bk';
    public $timestamps = true;
}
