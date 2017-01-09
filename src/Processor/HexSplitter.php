<?php

namespace OBD\Processor;

/**
 * Class HexSplitter
 * Splits a big chunk of hex data to header and body.
 * @package OBD\Processor
 */
class HexSplitter
{
    /**
     * @var string
     */
    private $hexData;

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
     * @param string $hexData
     */
    public function __construct($hexData)
    {
        $this->hexData = $hexData;
        $hexData = str_replace(self::MSG_BOUNDARY, '', $hexData);
        $this->header = substr($hexData, 0, 23);
        $this->body = substr($hexData, 24);
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
        return $this->hexData;
    }
}
