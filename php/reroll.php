<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 8/30/17
 * Time: 2:51 PM
 */

    $uname = $_REQUEST['user'];
    $user = json_decode(file_get_contents("../chars/$uname.json"), true);


    foreach ($user['stats'] as $key => $stat){
        $stat = null;
        $stat = rand(1, 6) + rand(1, 6) + rand(1, 6) + rand(1, 6);
        $user['stats'][$key] = $stat;
    }
    $user['statRolls'] = $user['statRolls'] + 1;
    $newUser = json_encode($user);

    file_put_contents("../chars/$uname.json", $newUser);

