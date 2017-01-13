<?php

namespace OBD;

use OBD\Processor\HexDataStore;
use OBD\Commands\Commands as CommandService;

class Service
{
    /**
     * @param $data
     *
     * @return string
     */
    public function process($data)
    {
        if (count($data) === 0) {
            return '';
        }
        $commandService = new CommandService();
        $hexData = (new HexDataStore(Converter::toHex($data)));
        echo 'Raw Hex data..'.PHP_EOL;
        print_r($hexData->getRawData());
        $commandService->processCommand($hexData);

        return $commandService->performAction();
    }
}
