<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    public $primaryKey = 'id_bk';
    public $timestamps = true;
}
