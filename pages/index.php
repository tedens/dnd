<?php
//classmap without using composer autoload
include '../php/classmap.php';

//get current user to view
$uname = $_SERVER['QUERY_STRING'];

if (file_exists('../chars/'.$uname.'.json')) {
    $user = json_decode(file_get_contents("../chars/$uname.json"), true);
} else {
    copy('../chars/template.json', '../chars/'.$uname.'.json');
    $user = json_decode(file_get_contents("../chars/$uname.json"), true);
}
//get user json file since not using a db and convert to php array

//some one off variables
$exp = $user['exp'];
$gold = $user['gold'];
$align = $user['align'];
$fullName = $user['firstname'].' '.$user['lastname'];
$age = $user['age'];
$race = $user['race'];
$class = $user['class'];
$gender = $user['sex'];



//get ability modify info
$am = new abilityModifer();

if ($user['statRolls'] !== '5'){
    $allowRolls = true;
} else {
    $allowRolls = false;
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'reroll':
            break;
    }
}


//get level based on exp amount.
$lf = new levelFinder();
$lvl = $lf->getLevel($exp);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>510 -  DND Group</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">510 - DND Dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">


            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $fullName; ?></h1>


                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="col-lg-12 fa-border left">
                        <h4>
                            Character Info
                        </h4>
                        <?php
                        echo "<ul>Race: $race</ul>";
                        echo "<ul>Class: $class</ul>";
                        echo "<ul>Gender: $gender</ul>";
                        echo "<ul>Age: $age</ul>";
                        echo "<ul>Alignment: $align</ul>";

                        echo "<hr>";
                        foreach ($user['stats'] as $key => $st){
                            echo "<ul>$key: $st -- Mod: ".$am->getAbilityModifer($st)."</ul>";
                        }
                        ?>
                        <hr>
                        <?php
                        echo "<ul>Exp: $exp</ul>";
                        echo "<ul>Level: $lvl</ul>";
                        echo "<ul>Gold: ".$gold."g</ul>";
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 right">
                    <div class="col-lg-12 fa-border right">
                        <h4>
                            Inventory
                        </h4>
                        <table cellpadding="10" style="width: 100%;">
                            <?php
                            foreach($user['inv'] as $key => $item) {
                                echo "<tr>";
                                echo "<td>$key: </td>";
                                echo "<td>$item</td>";
                                if ($item) {
                                    echo "<td><button class='btn btn-danger itemUnEquip' data-type='".$key."' data-uname='".$uname."' value='".$item."'>Un-Equip</button></td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                        <hr>
                        <table cellpadding="10" style="width: 100%;">
                            <tr>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Stat Modifier
                                </th>
                                <th>
                                    Worth
                                </th>
                            </tr>
                                <?php
                                foreach($user['bag'] as $item) {
                                    echo "<tr>";
                                    echo "<td>".$item['type']."</td>";
                                    echo "<td title='".$item['desc']."'>".$item['name']."</td>";
                                    echo "<td>".$item['stats']." ". $item['stat']."</td>";
                                    echo "<td>".$item['cost']."g</td>";
                                    echo "<td><button class='btn btn-primary itemEquip' data-type='".$item['type']."' data-uname='".$uname."' value='".$item['name']."'>Equip</button></td>";
                                    echo "<td><button class='btn btn-success sellItem' data-uname='".$uname."' value='".$item['name']."'>Sell</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="col-lg-12 fa-border">
                        <h4>TODO</h4>
                        <?php if (5 - $user['statRolls'] !== 0){ echo '<button data-uname="'.$uname.'" id="reroll" class="btn btn-success button left">ReRoll ('.(5 - $user['statRolls']).' left)</button><br><br>';
    echo '<button type="button" id="satisfiedButton" class="btn btn-primary" data-uname="'.$uname.'">Satisfied with Stats?</button><br><br>';}
                        if($align == ''){ echo '<button type="button" id="setAlignButton" data-uname="'.$uname.'" data-toggle="modal" data-target="#setAlign" class="btn btn-primary">Set Alignment</button><br><br>';}
                         if($fullName == ' '){ echo '<button type="button" id="setNameButton" data-uname="'.$uname.'" data-toggle="modal" data-target="#setName" class="btn btn-primary">Set Name</button><br><br>';}
                        if($age == ''){ echo '<button type="button" id="setAgeButton" data-uname="'.$uname.'" data-toggle="modal" data-target="#setAge" class="btn btn-primary">Set Age</button><br><br>';}
                        if($race == ''){ echo '<button type="button" id="setRaceButton" data-uname="'.$uname.'" data-toggle="modal" data-target="#setRace" class="btn btn-primary">Set Race</button><br><br>';}
                        if($class == ''){ echo '<button type="button" id="setClassButton" data-uname="'.$uname.'" data-toggle="modal" data-target="#setClass" class="btn btn-primary">Set Class</button><br><br>';}
                        if($gender == ''){ echo '<button type="button" id="setGenderButton" data-uname="'.$uname.'" data-toggle="modal" data-target="#setGender" class="btn btn-primary">Set Gender</button><br><br>';}
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../js/playerActions.js"></script>
<?php include 'playerModals.html'; ?>
</body>

</html>
