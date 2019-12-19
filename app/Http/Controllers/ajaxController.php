<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room_type;
use App\service_room;

class ajaxController extends Controller
{
    //
    function getRoomType($id) {
    	$data=room_type::find($id);
    	$data->so_phong=$data->room->count();
    	return $data;
    }
}
