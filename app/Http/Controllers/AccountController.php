<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Mews\Captcha\CaptchaController;
use App\Models\Account;
use App\Http\Controllers\AuxController as Aux;
use Cookie;

class AccountController extends Controller
{
    public function index()
    {
        return view('account');
    }

    public function formRegister(AccountRequest $req)
    {
        if(!filter_var($req->email, FILTER_VALIDATE_EMAIL)){
            return back()->with('error', 'El email no es valido.');
        }

        /* Generar login aleatorio */
        $token = Aux::randomCode();
        $key_token = Aux::randomCode();
        $username = substr(Aux::randomCode(true), 0, 8);

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

        if(null === ($auth =  Account::where('ip', '=', Aux::getIp())->select('login', 'id', 'password', 'username')->get()))
        {
            return back()->with('error', 'La información ingresada no es valida');
        }
        else
        {
            foreach ($auth as $key)
            {
                if(password_verify($req->login, $key->login))
                {
                    if(password_verify($req->password, $key->password))
                    {
                        setcookie('login', $req->login, strtotime( '+30 days' ), '/');

                        // panel
                        return redirect('p/'.$key->username);
                    }
                    break;
                }
            }
            return back()->with('error', 'La información ingresada no es valida');
        }
    }
}
