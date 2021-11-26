<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Cookie;

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

    /**
     * Comprueba si las cookies existen
     * @param array elements del array
     * @param int state permite la cantidad de elementos a "saltar", es decir, si existen dos elementos y el estado esta a uno: solo es necesario que uno exista
     * @return bool
     * 
     *  */
    public static function hasCookie(?array $elements, int $state= 0){
        foreach($elements as $elem){
            if(null !== Cookie::get($elem)){
                $state++;
            }
        }
        return count($elements) <= $state ? true : false;  
    }
    /**
     * Consulta en la base de datos Account si existe
     * @param string element a buscar
     * @param string value para coincidir con la busqueda
     * @return int cantidad de coincidencias
     * 
     * */
    public static function checkIfExist($element, $value){
        return Account::where($element, '=', $value)->count();
    }
}
