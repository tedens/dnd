<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 9/2/17
 * Time: 9:45 AM
 */

$uname = $_REQUEST['user'];
$user = json_decode(file_get_contents("../chars/$uname.json"), true);


$user['bag'][] = array("type" => $_REQUEST['itemType'], "name" => $_REQUEST['itemName'], "stats" => $_REQUEST['statMod']);

$newUser = json_encode($user);

file_put_contents("../chars/$uname.json", $newUser);