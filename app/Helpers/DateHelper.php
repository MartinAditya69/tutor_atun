<?php
namespace App\Helpers;
class DateHelper{
    public static function dateFormat(){
        return date('d-m-Y');
    }
    public static function dateFormatIndonesia($format){
        return date($format);
    }
}
?>
