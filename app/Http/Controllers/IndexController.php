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
        if(null !== Cookie::get('login') && null !== Cookie::get('key'))
        {
            if(Account::where('login', '=', Aux::decrypt(Cookie::get('login'), Cookie::get('key')))->count())
            {
                echo "2";

                $auth = Account::select('key')->where('login', '=', Aux::decrypt(Cookie::get('login'), Cookie::get('key')))->limit(1)->get();

                dump($auth);

                if(strcmp($auth[0]->key, $key))
                {
                    echo "log in";
                }
            }
        }
        echo "false";
        // return vista del perfil
    }
}
