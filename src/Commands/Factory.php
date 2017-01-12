<?php

namespace OBD\Commands;

use OBD\Commands\Actions\Action;
use OBD\Commands\Actions\Dummy;
use OBD\Commands\Actions\Login;
use OBD\Processor\HexDataStore;

class Factory
{
    /**
     * @param string $action
     * @param HexDataStore $hex
     *
     * @return Action
     *
     */
    public static function createAction($action, HexDataStore $hex)
    {
        switch ($action) {
            case Actions::LOGIN_STR:
                return new Login($hex);
            default:
                return new Dummy($hex);
        }
    }
}
