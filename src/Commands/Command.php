<?php

namespace OBD\Commands;

class Command
{
    const POSITION = 'AA00';
    const POSITION_RSP = 'FF01';
    const LOGIN_REQ = 'AA02';
    const LOGIN_RSP = 'FF03';
    const SET_REQ = 'AA04';
    const SET_RSP = 'FF05';
    const UPGRADE_REQ = 'AA06';
    const UPGRADE_RSP = 'FF07';
    const DOWN_REQ = 'AA08';
    const DOWN_RSP = 'FF09';
    const UPFAULT_REQ = 'AA12';
    const UPFAULT_RSP = 'FF13';
    const HSO_REQ = 'AA14';
    const HSO_RSP = 'FF15';
    const CTRL_REQ = 'AA16';
    const CTRL_RSP = 'FF17';

}
