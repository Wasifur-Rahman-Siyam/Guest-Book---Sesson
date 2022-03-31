<?php
namespace App\Utility;

class Utility               
{
    public static function is_posted(){
        if(strtolower($_SERVER[ 'REQUEST_METHOD' ]) == 'post'){
             return true;
        }
        return false;
    }
}
?>