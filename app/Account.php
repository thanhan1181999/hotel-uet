<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    public $primaryKey = 'id_ac';
    protected $guarded = ['type_ac'];
    public $timestamps = false;

}
