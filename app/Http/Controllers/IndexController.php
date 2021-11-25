<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Controllers\AuxController as Aux;
use Cookie;

class IndexController extends Controller
{
    public function profile(Request $req){
        /* dueño */
        if(Cookie::get('login') && Cookie::get('key'))
        {


            echo Cookie::get('login')."---".Cookie::get('key');

            if(Account::where('login', '=', Aux::decrypt(Cookie::get('login'), Cookie::get('key')))->count())
            {

                $auth = Account::select('key')->where('login', '=', Aux::decrypt(Cookie::get('login'), Cookie::get('key')))->limit(1)->get();

                dump($auth);/*
                if(strcmp($auth[0]->key, $key))
                {
                    echo "log in";
                }   */
            }
        }
        dump($req->cookie());

        // return vista del perfil
    }
}
