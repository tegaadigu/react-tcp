<?php

namespace OBD;

use OBD\Processor\HexSplitter;

class Service
{
    /**
     * @param $data
     *
     * @return string
     */
    public function process($data)
    {
        if(empty($data) === true) {
            return '';
        }

        $slicedData = new HexSplitter(Converter::toHex($data));

        echo 'Header...'.PHP_EOL;
        print_r($slicedData->getHeader());

        echo PHP_EOL.'body...'.PHP_EOL;
        print_r($slicedData->getBody());

        echo PHP_EOL.'Raw data...'.PHP_EOL;
        print_r($slicedData->getRawData());
        return 'ooh hey there';
    }
}
