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
     * @param string $hexData
     */
    public function __construct($hexData)
    {
        $this->hexData = $hexData;
        $this->header = substr($this->hexData, 0, 23);
        $this->body = substr($this->hexData, 24);
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
