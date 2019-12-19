<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    //
    function logout() {
    	session()->forget('account');
    	return redirect('/');
    }
}
