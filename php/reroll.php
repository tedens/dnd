<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 8/30/17
 * Time: 2:51 PM
 */

if (isset($_POST)){
    $uname = $_POST['uname'];
    $user = json_decode(file_get_contents("../chars/$uname.json"), true);

    foreach ($user['stats'] as $stat){
        $stat = rand(8, 15);
    }
    $newUser = json_encode($user);
    file_put_contents("../chars/$uname.json", $newUser);
}