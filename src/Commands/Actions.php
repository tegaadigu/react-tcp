<?php

namespace OBD\Commands;

class Actions
{
    /**
     * @const string
     */
    const POSITION_REQ = 'AA00';

    /**
     * @const string
     */
    const POSITION_RSP = 'FF01';

    /**
     * @const string
     */
    const LOGIN_REQ = 'AA02';

    /**
     * @const string
     */
    const LOGIN_RSP = 'FF03';

    /**
     * @const string
     */
    const SET_REQ = 'AA04';

    /**
     * @const string
     */
    const SET_RSP = 'FF05';

    /**
     * @const string
     */
    const UPGRADE_REQ = 'AA06';

    /**
     * @const string
     */
    const UPGRADE_RSP = 'FF07';

    /**
     * @const string
     */
    const DOWN_REQ = 'AA08';

    /**
     * @const string
     */
    const DOWN_RSP = 'FF09';

    /**
     * @const string
     */
    const UPFAULT_REQ = 'AA12';

    /**
     * @const string
     */
    const UPFAULT_RSP = 'FF13';

    /**
     * @const string
     */
    const HSO_REQ = 'AA14';

    /**
     * @const string
     */
    const HSO_RSP = 'FF15';

    /**
     * @const string
     */
    const CTRL_REQ = 'AA16';

    /**
     * @const string
     */
    const CTRL_RSP = 'FF17';

    /**
     * @const string
     */
    const LOGIN_STR = 'login';

    /**
     * @const string
     */
    const POSITION_STR = 'position';

    /**
     * @const array
     */
    const EXPECTED_ACTIONS = [
        self::LOGIN_REQ => self::LOGIN_STR,
        self::POSITION_REQ => self::POSITION_STR,
    ];

}
