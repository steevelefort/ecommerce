<?php

namespace App\Libs;

class Common
{

    public static function withVAT($price, $vat_rate) {
        return $price + $price * $vat_rate / 100;
    }

    public static function computeVAT($price, $vat_rate) {
        return $price * $vat_rate / 100;
    }

}
