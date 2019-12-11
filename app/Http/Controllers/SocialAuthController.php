<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite, Auth, Redirect, Session, URL;
use App\User;
use App\Account;

class SocialAuthController extends Controller
{
    /*
    chuyển hướng người dùng sang OAuth Provider
     */
    public function redirectToProvider($provider)
    {
        // if(!Session::has('pre_url'))
        // {
        //     Session::put('pre_url',URL::previous());
        // }
        // else
        // {
        //     if (URL::previous() != URL::to('login')) {
        //         Session::put('pre_url',URL::previous());
        //     }
        // }
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();
        $account = $this->findOrCreateUser($user,$provider);
        Session::put('login','user');
        Session::put('id_ac',$account['id_ac']);
        return  Redirect::to(Session::get('old_url'));
    }
    public function findOrCreateUser($user,$provider)
    {
        $account = Account::where('email',$user->email)->first();
        if ($account) {
            $account->provider = $provider;
            $account->provider_id = $user->id;
            return $account;
        }
        else{
            $account2 = new Account();
            $account2->name = $user->name;
            $account2->email = $user->email;
            $account2->avatar = $user->avatar;
            $account2->provider = $provider;
            $account2->provider_id = $user->id;
            $account2->save();
            return $account2;
        }
    }
}
