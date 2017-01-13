<?php

namespace OBD\Processor;

/**
 * Class HexSplitter
 * Splits a big chunk of hex data to header and body. And stores it in its child variables
 * @package OBD\Processor
 */
class HexDataStore
{
    /**
     * @var string
     */
    private $rawData;

    /**
     * @var string
     */
    private $header;

    /**
     * @var string
     */
    private $body;

    /**
     * @const string
     */
    const MSG_BOUNDARY = 'C0';

    /**
     * @const int
     */
    const SERIAL_START_POSITION = 12;

    /**
     * @const int
     */
    const HEADER_END_POSITION = 24;

    /**
     * @param string $hexData
     */
    public function __construct($hexData)
    {
        $this->rawData = $hexData;
        $hexData = $this->removeMsgBoundary($hexData);
        $this->header = substr($hexData, 0, self::HEADER_END_POSITION);
        $this->body = substr($hexData, self::HEADER_END_POSITION);
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getRawData()
    {
        return $this->rawData;
    }

    /**
     * @param $hexData
     *
     * @return string
     */
    private function removeMsgBoundary($hexData)
    {
        return substr($hexData, 2, strrpos($hexData, self::MSG_BOUNDARY) - strlen($hexData));
    }

    /**
     * @return string
     */
    public function getSerialNumber()
    {
        return substr($this->getHeader(), self::SERIAL_START_POSITION);
    }
}
