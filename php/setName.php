<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 9/2/17
 * Time: 1:48 AM
 */

$uname = $_REQUEST['user'];
$user = json_decode(file_get_contents("../chars/$uname.json"), true);

$user['firstname'] = $_REQUEST['fname'];
$user['lastname'] = $_REQUEST['lname'];
$newUser = json_encode($user);

file_put_contents("../chars/$uname.json", $newUser);
