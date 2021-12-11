<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Controllers\AuxController as Aux;
use Cookie;

class IndexController extends Controller
{
    public function profile(Request $req)
    {
        if(Aux::checkIfExist('username', $req->username))
        {
            if(Aux::hasCookie(['login', 'key']))
            {
                if(Aux::checkIfExist('login', Cookie::get('login')))
                {
                    $auth = Account::select('key', 'login', 'username')->where('username', '=', $req->username)->limit(1)->get();

                    if((strcmp($auth[0]->key, Cookie::get('key')) == 0) && (strcmp($auth[0]->login, Cookie::get('login')) == 0))
                    {
                        return view('profile/owner')->with('username', $auth[0]->username)->with('boards', ['board', 'bparddd']);
                    }
                }             
            }
        }else{
            return view('profile/user')->with('error', 'El USUARIO NO EXISTE');    
        }
        return view('profile/user');
        
    }
}
