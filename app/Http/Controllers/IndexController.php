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

            $auth = Account::select('key', 'login', 'username', 'created_at')->where('username', '=', $req->username)->limit(1)->get();

            if($auth[0]->username === null)
            {
                echo "false";
            }

            if(Aux::hasCookie(['login', 'key']))
            {
                if(Aux::checkIfExist('login', Cookie::get('login')))
                {
                    if((strcmp($auth[0]->key, Cookie::get('key')) == 0) && (strcmp($auth[0]->login, Cookie::get('login')) == 0))
                    {
                        return view('profile')
                        ->with('user', $auth[0])
                        ->with('boards', ['board', 'bparddd'])
                        ->with('owner', $auth[0]->key);
                    }
                }             
            }
        }else{
            /* Si existe un error solo imprime el error y una pagina en blanco con un boton que devuelve al index */
            return view('profile')->with('error', 'El USUARIO NO EXISTE');    
        }
        return view('profile')
        ->with('user', $auth[0])
        ->with('boards', ['board', 'bparddd']);      
    }
}
