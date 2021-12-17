<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewBoardRequest;
use App\Models\Board;
use App\Models\Account;
use App\Http\Controllers\AuxController as Aux;
use Cookie;

class BoardController extends Controller
{
    public function formBoard()
    {
        if(!Aux::checkUser())
        {
            return redirect('login')->withErrors([
                'login' => 'Para crear un board necesitas iniciar sesión'
            ]);
        }

        return view('crear-board');
    }

    public function newBoard(NewBoardRequest $req)
    {
        if(!Aux::checkUser())
        {
            return redirect('login')->withErrors([
                'login' => 'Para crear un board necesitas iniciar sesión'
            ]);
        }
        $auth = Account::select('username')->where('login', '=', Cookie::get('login'))->limit(1)->get();

        $tags = json_encode(explode(',', str_replace(' ','', $req->tags)));

        Board::create([
            'owner' => $auth[0]->username,
            'name' => $req->name,
            'tags' => $tags,
            'description' => $req->description,
            'mods' => '["'.$auth[0]->username.'"]',
            'confirmed' => false
        ]);

        return redirect('p/'.$auth[0]->username)->with('alert', 'Su board se ha creado con éxito. Ahora tiene que ser verificado por un moderador');
    }
}
