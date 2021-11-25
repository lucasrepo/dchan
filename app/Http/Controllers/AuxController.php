<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuxController extends Controller
{
    public static function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return "false";
    }

    /**
     * @param bool extended to bin2hex
     * @param int bytes 
     * @return string || int
     *
     **/
    public static function randomCode($extended = true, $bytes = 16){
        $algo = openssl_random_pseudo_bytes($bytes);
        return ($extended == true) ? bin2hex($algo) : $algo;
    }

    public static function setCookie($key, $value){
        return setcookie($key, $value, strtotime( '+30 days' ), '/');
    }

    public static function encrypt($data, $key){
        return openssl_encrypt($data, $this->cipher, $key, OPENSSL_ZERO_PADDING, openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher)));
    }

    public static function decrypt($ciphertext, $key){
        return openssl_decrypt($ciphertext, $this->cipher, $key, OPENSSL_ZERO_PADDING, openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher)));
    }

    private $cipher = "aes-128-gcm";

}
