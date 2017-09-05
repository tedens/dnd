<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 9/3/17
 * Time: 9:37 AM
 */

if (isset($_REQUEST['user'])){
    $user = json_decode(file_get_contents("../chars/".$_REQUEST['user'].".json"), true);

}
if (isset($_REQUEST['item'])){
    $item = $_REQUEST['item'];
}
if (isset($_REQUEST['type'])){
  $type = $_REQUEST['type'];
}

switch ($_REQUEST['action']){

    case "gold":
        $user['gold'] = $user['gold'] + $_REQUEST['gold'];
        break;

    case "unequipItem2":
    foreach ($user['inv'] as $key => $value){
        if($key == $type){
            $item = $value;
            if (empty($item)){
              die();
            }
            foreach ($user['bag'] as $key => $value){
                if($value['name'] == $item){
                  $stat['int'] = $value['stats'];
                  $stat['val'] = $value['stat'];
                }
            }
        }
    }
    $user['inv'][$type] = "";
    if($stat['val'] !== 'other'){
      $user['stats'][$stat['val']] = $user['stats'][$stat['val']] - intval($stat['int']);
    }
    break;

    case "unequipItem":
        foreach ($user['inv'] as $key => $value){
            if($value == $item){
                $type = $key;
                foreach ($user['bag'] as $key => $value){
                    if($value['name'] == $item){
                      $stat['int'] = $value['stats'];
                      $stat['val'] = $value['stat'];
                    }
                }
            }
        }
        $user['inv'][$type] = "";
        if($stat['val'] !== 'other'){
          $user['stats'][$stat['val']] = $user['stats'][$stat['val']] - intval($stat['int']);
        }
        break;

    case "addItem":
        $user['bag'][] = array("type" => $_REQUEST['itemType'], "name" => $_REQUEST['itemName'], "stats" => $_REQUEST['statMod'], "stat" => $_REQUEST['stat'], "desc" => $_REQUEST['desc'], "cost" => $_REQUEST['cost']);
        break;

    case "sellItem":
        foreach ($user['bag'] as $key => $value){
            if($value['name'] == $item){
                $type = $value['type'];
                $itemKey = $key;
                $cost = $value['cost'];
            }
        }
        foreach ($user['inv'] as $key => $value){
            if($value == $item){
                $type = $key;
            }
        }
        $user['inv'][$type] = "";
        $user['gold'] = $user['gold'] + $cost;
        unset($user['bag'][$itemKey]);
        echo "$item has been removed and sold for $cost gold, you should now have a balance of " . $user['gold']."g";
        break;

    case "equipItem":

        foreach ($user['bag'] as $value){
            if($value['name'] == $item){
                $type = $value['type'];
                $stat['int'] = $value['stats'];
                $stat['val'] = $value['stat'];
            }
        }
          $user['inv'][$type] = $item;

        if($stat['val'] !== 'other'){
          $user['stats'][$stat['val']] = $user['stats'][$stat['val']] + intval($stat['int']);
        }
        break;

    case "reroll":
        foreach ($user['stats'] as $key => $stat){
            $stat = null;
            $stat = rand(1, 6) + rand(1, 6) + rand(1, 6) + rand(1, 6);
            $user['stats'][$key] = $stat;
        }
        $user['statRolls'] = $user['statRolls'] + 1;
        break;

    case "setName":
        $user['firstname'] = $_REQUEST['fname'];
        $user['lastname'] = $_REQUEST['lname'];
        break;

    case "setAlign":
        $user['align'] = $_REQUEST['align'];
        break;

    case "setAge":
        $user['age'] = $_REQUEST['age'];
        break;

    case "setGender":
        $user['sex'] = $_REQUEST['gender'];
        break;

    case "setRace":
        $user['race'] = $_REQUEST['race'];
        break;

    case "setClass":
        $user['class'] = $_REQUEST['class'];
        break;

    case "setExp":
        $user['exp'] = $user['exp'] + $_REQUEST['exp'];
        break;

    case "satisfy":
        $user['statRolls'] = 5;
        break;

    case "dmLog":
        include 'dmLogging.php';
        $logger = new dmLogging();
        $data = $logger->addToLog($_REQUEST['log']);
        echo $data;
        break;
}

if (isset($user)) {

    $newUser = json_encode($user);
    file_put_contents("../chars/" . $_REQUEST['user'] . ".json", $newUser);
}
