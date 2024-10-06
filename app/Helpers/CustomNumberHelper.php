<?php

namespace App\Helpers;

class CustomNumberHelper
{
    // roman numerals
    public static function toRoman($number)
    {
        $map = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];

        $result = '';

        foreach ($map as $roman => $arabic) {
            $matches = intval($number / $arabic);
            $result .= str_repeat($roman, $matches);
            $number = $number % $arabic;
        }

        return $result;
    }

    // to arabic
    public static function toArabic($number)
    {
        $map = [
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1,
        ];

        $result = 0;

        foreach ($map as $roman => $arabic) {
            while (strpos($number, $roman) === 0) {
                $result += $arabic;
                $number = substr($number, strlen($roman));
            }
        }

        return $result;
    }
}