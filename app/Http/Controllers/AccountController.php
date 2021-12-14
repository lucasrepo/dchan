<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Mews\Captcha\CaptchaController;
use App\Models\Account;
use App\Http\Controllers\AuxController as Aux;
use App\Http\Controllers\IndexController;
use Cookie;

class AccountController extends Controller
{
    public function index()
    {
        if(Aux::hasCookie(['login', 'key'])){

            $acc = Account::select('username')->where('login', '=', Cookie::get('login'))->limit(1)->get();

            return $acc[0]->username !== null ? redirect()->action([IndexController::class, 'profile'], ['username' => $acc[0]->username]) : view('login');
        }else{
            return view('login');    
        }
    }

    public function formRegister(AccountRequest $req)
    {
        if(!filter_var($req->email, FILTER_VALIDATE_EMAIL)){
            return back()->withErrors([
                'email' => 'La información ingresada no es valida'
            ]);
        }

        /* Generar login aleatorio */
        $token = Aux::randomCode();
        $key_token = Aux::randomCode();

        $username = substr(Aux::randomCode(true), 0, 8);
        /* Por las dudas */
        while(0 != Account::where('username', '=', $username)->count())
        {
            $username = substr(Aux::randomCode(true), 0, 8);
        }

        Account::create([
            'login' => $token,
            'key' => $key_token,
            'password' => password_hash($req->password,  PASSWORD_DEFAULT),
            'email' => $req->email,
            'ip' => Aux::getIp(),
            'username' => $username,
        ]);

        Cookie::queue('login', $token, strtotime('+6 weeks'));
        Cookie::queue('key', $key_token, strtotime('+6 weeks'));

        // panel
        return redirect('p/'.$username.'?token='.$token);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function formLogin(Request $req){

        $req->validate([
            'login' => 'required|max:40',
            'password' => 'required|max:30',
        ]);

        if(!Aux::checkIfExist('login', $req->login))
        {
            return back()->withErrors([
            'email' => 'La información ingresada no es valida',
            ]);
        }

        $auth =  Account::where('login', '=', $req->login)->select('key', 'password', 'username')->limit(1)->get();

        if(password_verify($req->password, $auth[0]->password))
        {
            Cookie::queue('login', $req->login, strtotime('+6 weeks'));
            Cookie::queue('key', $auth[0]->key, strtotime('+6 weeks'));
            return redirect('p/'.$auth[0]->username);
        }
        return back()->withErrors([
            'email' => 'La información ingresada no es valida',
        ]);
    }

    public function signOut(Request $req)
    {
        if($req->hasCookie('login') && $req->hasCookie('key'))
        {
            Cookie::queue(Cookie::forget('login'));
            Cookie::queue(Cookie::forget('key'));
        }
        return redirect('/');
    }
}
