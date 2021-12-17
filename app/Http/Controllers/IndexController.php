<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Board;
use App\Http\Controllers\AuxController as Aux;
use Cookie;

class IndexController extends Controller
{
    public function home()
    {
        return view('home')
            ->with('boards', 
                $this->boardsAvailable(
                    Board::select('name', 'tags', 'confirmed')->limit(7)->get()
                )
            );
    }

    public function profile(Request $req)
    {
        if(!Aux::checkIfExist('username', $req->username))
        {
            return view('profile')->withErrors([
                'inexistente'=> 'El usuario no existe'
            ]);
        }

        $auth = Account::select('key', 'login', 'username', 'created_at')->where('username', '=', $req->username)->limit(1)->get();


        $boards = Board::select('name', 'tags', 'confirmed')->where('owner', '=', $auth[0]->username)->get();

        $boardsLinks = $this->boardsAvailable($boards);

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
                    return count($boardsLinks) != 0 ? 
                        view('profile')
                            ->with('user', $auth[0])
                            ->with('boards', $boardsLinks)
                            ->with('owner', $auth[0]->key) : 
                        view('profile')
                            ->with('user', $auth[0])
                            ->with('owner', $auth[0]->key);
                }
            }
        }

        return count($boardsLinks) != 0 ?
            view('profile')
                ->with('user', $auth[0])
                ->with('boards', $boardsLinks) : 
            view('profile')
                ->with('user', $auth[0]);
    }

    /**
     * @param object $boards
     * @return los boards confirmados
     * */
    private function boardsAvailable($boards) : array
    {
        $boardsLinks = [];

        for( $i=0; $i < count($boards); $i++)
        {
            $tags = json_decode($boards[$i]->tags);
            if($boards[$i]->confirmed)
            {
                array_push($boardsLinks, array('b'.$tags[0] => $boards[$i]->name));    
            }
        }
        return $boardsLinks;
    }

}