<?php

namespace OBD\Commands\Actions;

class Dummy extends Action
{
    /**
     * @return string
     */
    public function perform()
    {
        return 'Dummy Action.';
    }

    /**
     * @return array
     */
    public function processHexData()
    {
        return '';
    }
}
