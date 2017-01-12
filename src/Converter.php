<?php

namespace OBD;

class Converter
{
    /**
     * @param string $string
     *
     * @return string
     */
    public static function toHex($string)
    {
        $hex = '';
        $strLength = strlen($string);
        for ($i = 0; $i < $strLength; $i++) {
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0' . $hexCode, -2);
        }

        return strtoupper($hex);
    }

    /**
     * @param string $hex
     *
     * @return string
     */
    public static function toString($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }

        return $string;
    }
}
