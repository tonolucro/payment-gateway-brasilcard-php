<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Helper;

class Convert
{
    public static function valueAmount($floatValue){
        return number_format($floatValue, 2, '', '');
    }
}