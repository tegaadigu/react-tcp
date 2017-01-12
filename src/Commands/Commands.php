<?php

namespace OBD\Commands;

use OBD\Commands\Actions\Action;
use OBD\Processor\HexDataStore;

class Commands
{

    /**
     * @var Action
     */
    private $action;

    /**
     * @param HexDataStore $hex
     * @param string $actionCommand
     */
    public function processCommand(HexDataStore $hex, $actionCommand = '')
    {
        foreach (Actions::EXPECTED_ACTIONS as $action => $actionStr) {
            if (strpos($hex->getHeader(), $action) !== false) {
                $actionCommand = $actionStr;
                break;
            }
        }
        $this->action = Factory::createAction($actionCommand, $hex);
    }

    /**
     * @return string
     */
    public function performAction()
    {
        return $this->action->perform();
    }
}
