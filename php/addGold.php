<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 9/2/17
 * Time: 9:34 AM
 */

$uname = $_REQUEST['user'];
$user = json_decode(file_get_contents("../chars/$uname.json"), true);

$user['gold'] = $user['gold'] + $_REQUEST['gold'];
$newUser = json_encode($user);

file_put_contents("../chars/$uname.json", $newUser);