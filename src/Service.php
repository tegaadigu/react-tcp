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
        $commandService->processCommand((new HexDataStore(Converter::toHex($data))));

        return hex2bin($commandService->performAction());
    }
}
