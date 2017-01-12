<?php

namespace OBD\Commands\Actions;

use OBD\Processor\HexDataStore;

abstract class Action
{
    /**
     * @const []
     */
    const COMMAND_IDS = [1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F'];

    /**
     * @const string
     */
    const TEMP_PACKET_LENGTH = 'ZZ';

    /**
     * @const int
     */
    const DELIMITER_RANGE = 4;

    /**
     * @var HexDataStore
     */
    protected $hexDataStore;

    /**
     * Action constructor.
     *
     * @param HexDataStore $hex
     */
    public function __construct(HexDataStore $hex)
    {
        $this->hexDataStore = $hex;
    }

    /**
     * @return string
     */
    public abstract function perform();

    /**
     * @return array
     */
    public abstract function processHexData();

    /**
     * @param string $data
     *
     * @return string
     */
    public function getPacketLength($data)
    {
        $data = str_replace(self::TEMP_PACKET_LENGTH, '', $data);
        $packetLength = dechex(strlen($data) / 2);
        if (strlen($packetLength) === 1) {
            $packetLength = '0' . $packetLength;
        }

        return strtoupper($packetLength);
    }
}
