<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 9/5/17
 * Time: 9:32 AM
 */

class dmLogging
{
    public function __construct()
    {
    }

    public function addToLog($log)
    {
        $data = "$log\n";
        $data .= file_get_contents('../data/dm-log.txt');
        file_put_contents('../data/dm-log.txt', $data);
        return "Data added to DM log.";
    }

    public function addToPlayerLog($log)
    {
        $data = "$log\n";
        $data .= file_get_contents('../data/player-log.txt');
        file_put_contents('../data/player-log.txt', $data);
        return "Data added to player log.";
    }

}
