<?php
namespace App\Core;
class Validar{
    public static function isnull($value){
        return $value ==null;
    }
    public static function required($value){
        return strlen(trim($value))>0;
    }

}
