<?php

namespace App;
use App\Vehicle;
use Validator;

class Helper {

    public static function layout()
    {
        return \Request::is('admin/*') ? 'layouts.admin' : 'layouts.app';
    }

    public static function isAdmin()
    {
        return \Request::is('admin/*') ? true : false;
    }

    public static function encodeBase64($texto)
    {
        return  isset($texto) ? base64_encode($texto) : null;
    }

    public static function decodeBase64($texto)
    {
        return  isset($texto) ? base64_decode($texto) : null;
    }

    public static function mask(String $mask, String $str) {
        $str = str_replace(" ","",$str);

        for($i=0;$i<strlen($str);$i++)
            $mask[strpos($mask,"#")] = $str[$i];

        return $mask;
    }

    public static function mask_cpf(String $str) {
        return mask("###.###.###-##", $str);
    }
}