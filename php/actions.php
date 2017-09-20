<?php
/**
 * Created by PhpStorm.
 * User: tj
 * Date: 9/3/17
 * Time: 9:37 AM
 */

if (isset($_REQUEST['user'])){
    $user = json_decode(file_get_contents("../chars/".$_REQUEST['user'].".json"), true);

} else {
  $users = scandir('../chars/');
  foreach ($users as $allUsers){
     if(($allUsers == '.') || ($allUsers == '..')) {
         $key = array_search($allUsers, $users);
         unset($users[$key]);
     }
  }
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
        if (isset($stat['val'])){
        $user['inv'][$type] = "";
        if($stat['val'] !== 'other'){
          $user['stats'][$stat['val']] = $user['stats'][$stat['val']] - intval($stat['int']);
        }
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
            $stat = rand(2, 4) + rand(2, 4) + rand(2, 4) + rand(2, 4);
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
        $race = $_REQUEST['race'];
        $user['race'] = $race;
        if ($race == 'Dragonborn') {
            $user['stats']['Strength'] = $user['stats']['Strength'] + 2;
            $user['stats']['Charisma'] = $user['stats']['Charisma'] + 1;
        } elseif ($race == 'Dwarf') {
            $user['stats']['Wisdom'] = $user['stats']['Wisdom'] + 1;
            $user['maxHp'] = $user['maxHp'] + 1;
        } elseif ($race == 'Elf') {
            $user['stats']['Dexterity'] = $user['stats']['Dexterity'] + 2;
        } elseif ($race == 'Gnome') {
            $user['stats']['Dexterity'] = $user['stats']['Dexterity'] + 1;
        } elseif ($race == 'Half-Elf') {
            $user['stats']['Charisma'] = $user['stats']['Charisma'] + 2;
        } elseif ($race == 'Half-Orc') {
            $user['stats']['Strength'] = $user['stats']['Strength'] + 2;
            $user['stats']['Constitution'] = $user['stats']['Constitution'] + 1;
        } elseif ($race == 'Hafling') {
            $user['stats']['Dexterity'] = $user['stats']['Dexterity'] + 2;
        } elseif ($race == 'Human') {
            $user['stats']['Strength'] = $user['stats']['Strength'] + 1;
            $user['stats']['Constitution'] = $user['stats']['Constitution'] + 1;
            $user['stats']['Dexterity'] = $user['stats']['Dexterity'] + 1;
            $user['stats']['Intelligence'] = $user['stats']['Intelligence'] + 1;
            $user['stats']['Wisdom'] = $user['stats']['Wisdom'] + 1;
            $user['stats']['Charisma'] = $user['stats']['Charisma'] + 1;
        } elseif ($race == 'Lizard-Folk') {
            $user['stats']['Constitution'] = $user['stats']['Constitution'] + 2;

        } elseif ($race == 'Tiefling') {
            $user['stats']['Intelligence'] = $user['stats']['Intelligence'] + 1;
            $user['stats']['Charisma'] = $user['stats']['Charisma'] + 2;
        }

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

    case "tradeGold":
        $player = $_REQUEST['player'];
        if (isset($_REQUEST['gold']) || isset($player)){
          $playerConf = json_decode(file_get_contents("../chars/".$player.".json"), true);
          $user['gold'] = $user['gold'] - abs($_REQUEST['gold']);
          $playerConf['gold'] = $playerConf['gold'] + abs($_REQUEST['gold']);
          $newPlayer = json_encode($playerConf);
          file_put_contents("../chars/" . $player . ".json", $newPlayer);
        }
        break;

    case "dmLog":
        include 'dmLogging.php';
        $logger = new dmLogging();
        $data = $logger->addToLog($_REQUEST['log']);
        echo $data;
        break;

    case "playerLog":
        include 'dmLogging.php';
        $logger = new dmLogging();
        $data = $logger->addToPlayerLog($_REQUEST['log']);
        echo $data;
        break;

    case "quiverAdd":
        foreach ($user['bag'] as $key => $value){
            if($value['name'] == $_REQUEST['item']){
                $user['bag'][$key]['desc'] = $user['bag'][$key]['desc'] + 1;
            }
        }
        break;

    case "quiverDel":
        foreach ($user['bag'] as $key => $value) {
            if ($value['name'] == $_REQUEST['item']) {
                $user['bag'][$key]['desc'] = $user['bag'][$key]['desc'] - 1;
            }
        }
        break;

    case "tradeItem":
    $player = $_REQUEST['player'];

        if (isset($item) || isset($player)){
          $playerConf = json_decode(file_get_contents("../chars/".$player.".json"), true);
          foreach ($user['bag'] as $key => $value){
              if($value['name'] == $item){
                  $itemId = $key;
              }
          }
          $itemToTrade = $user['bag'][$itemId];
          if (isset($itemToTrade)){
            unset($user['bag'][$itemId]);
            $playerConf['bag'][] = $itemToTrade;
            $newPlayer = json_encode($playerConf);
            file_put_contents("../chars/" . $player . ".json", $newPlayer);
          }
        } else {
          echo "Bad trade";
        }

        break;
    case "updateStat":
        $user['stats'][$_REQUEST['stat']] = $user['stats'][$_REQUEST['stat']] + floor($_REQUEST['addStat']);
        break;

    case "saveSkill":
        $user['skills'][] = array($_REQUEST['skill'] => "");
        break;
    case "saveSpell":
        $user['spells'][] = array("lvl" => $_REQUEST['spellLvl'],"name" => $_REQUEST['spellName'],"desc" => $_REQUEST['spellDesc']);
        break;
    case "removeSpell":
        $spell = $_REQUEST['spell'];
        foreach ($user['spells'] as $key => $value){
            if($value['name'] == $spell){
                $spellKey = $key;
            }
        }
        unset($user['spells'][$spellKey]);
        break;
    case "setHp":
        if ($user['hp'] == ""){
          $user['maxHp'] = $_REQUEST['hp'];
        }
        $user['hp'] = $user['hp'] + $_REQUEST['hp'];
        break;
    case "restMode":
        foreach ($users as $u){
          $newUser = json_decode(file_get_contents("../chars/".$u), true);
          $newUser['restMode'] = $_REQUEST['restMode'];
          $newUser['hp'] = $newUser['maxHp'];
          $newUser = json_encode($newUser);
          file_put_contents("../chars/" . $u, $newUser);
        }
        break;

    case "rollDice":
        $type = $_REQUEST['type'];
        $amount = $_REQUEST['amount'];
        if ($type == 'body'){
            $body = array('Head','Right Leg','Full Body','Right Hand','Right Arm','Left Foot','Right Foot','Left Hand','Left Arm','Stomach','Left Leg','Chest');
            $roll = mt_rand(1,12);
            $roll = $body[$roll];
        } else {
            $maxResult = $type * $amount;
            $roll = mt_rand($amount, $maxResult);
        }
        echo $roll;
        break;
}

if (isset($user)) {

    $newUser = json_encode($user);
    file_put_contents("../chars/" . $_REQUEST['user'] . ".json", $newUser);
}
