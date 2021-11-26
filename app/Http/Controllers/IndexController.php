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
            if(Account::where('login', '=', Cookie::get('login'))->count())
            {
                $auth = Account::select('key')->where('login', '=', Cookie::get('login'))->limit(1)->get();

                if(strcmp($auth[0]->key, Cookie::get('key')) == 0)
                {
                    return view('profile/owner');
                }
            }
        }
        return view('profile/user');
    }
}
