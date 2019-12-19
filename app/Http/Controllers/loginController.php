<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Socialite;
use App\account;

class loginController extends Controller
{
    //
    public function redirect($social)
    {   
        // lấy url trước khi chuyển hướng
        session()->put('url',url()->previous());
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
    	$userSocial=Socialite::driver($social)->user();
        //$account=account::where('id_social',$userSocial->getId())->where('social',$social)->first();
        $account=account::where('email',$userSocial->getEmail())->where('social',$social)->first();
        if($account=='') {
            $account=new account;
            $account->id_social=$userSocial->getId();
            $account->social=$social;
            $account->role=1;
        }
        $account->name=$userSocial->getName();
        $account->email=$userSocial->getEmail();
        $account->save();
        session()->put('account',$account);
        // chuyển hướng đến trang lúc đăng nhập
        return Redirect::to(session()->pull('url'));
    }
}
