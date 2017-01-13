<?php

namespace OBD\Commands\Actions;

use OBD\Commands\Actions;
use OBD\Processor\HexDataStore;

class Login extends Action
{
    /**
     * @const string
     */
    const SEQUENCE_PAD = '000';

    /**
     * @const int
     */
    const SHIFT_LENGTH = 6;

    /**
     * @const string
     */
    const OK = '00';

    /**
     * @const string
     */
    const FAIL = '01';

    /**
     * @const string
     */
    const RESPONSE_PAD = '010000';

    /**
     * @return string
     */
    public function perform()
    {
        $deviceData = $this->processHexData();
        if ($this->validate($deviceData)) {
            return $this->ok();
        }

        return $this->fail();
    }

    /**
     * @return array
     */
    public function processHexData()
    {
        $hexData = $this->hexDataStore->getBody();

        $processedData = [];
        $offset = 0;
        $nextPosition = 0;
        foreach (self::COMMAND_IDS as $index => $id) {
            $position = strpos($hexData, self::SEQUENCE_PAD . $id, $offset);
            if ($position === false) {
                continue;
            }
            $offset = $position + self::SHIFT_LENGTH;
            $sliced_ids = array_slice(self::COMMAND_IDS, $index + 1);
            foreach ($sliced_ids as $dataId) {
                $nextPosition = strpos($hexData, self::SEQUENCE_PAD . $dataId, $position + self::SHIFT_LENGTH);
                if ($dataId === end($sliced_ids)) {
                    $nextPosition = strlen($hexData);
                }
                if ($nextPosition === false) {
                    continue;
                }
                break;
            }
            $processedData[self::SEQUENCE_PAD . $id] = substr($hexData, $position, $nextPosition - $position);
        }

        return $processedData;

    }

    /**
     * @param array $deviceData
     *
     * @return bool
     */
    private function validate($deviceData)
    {
        return true;
    }

    /**
     * @return string
     */
    private function ok()
    {
        return $this->processHeader(self::OK);
    }

    /**
     * @return string
     */
    private function fail()
    {
        return $this->processHeader(self::FAIL);
    }

    /**
     * @param $type
     *
     * @return string
     */
    private function processHeader($type)
    {
        $data = sprintf(
            self::RESPONSE_PAD . '' . self::TEMP_PACKET_LENGTH . '%s%s%s%s',
            Actions::LOGIN_RSP,
            $this->hexDataStore->getSerialNumber(),
            $type,
            HexDataStore::MSG_BOUNDARY
        );
        $packetLength = $this->getPacketLength($data);
        $data = HexDataStore::MSG_BOUNDARY . '' . $data;

        return str_replace(self::TEMP_PACKET_LENGTH, $packetLength, $data);
    }
}
