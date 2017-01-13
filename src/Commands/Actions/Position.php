<?php

namespace OBD\Commands\Actions;

class Position extends Action
{

    /**
     * @return string
     */
    public function perform()
    {
        echo 'in Position..' . PHP_EOL;
        die;
    }

    /**
     * @return array
     */
    public function processHexData()
    {
        // TODO: Implement processHexData() method.
    }
}
