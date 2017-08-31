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


//get ability modify info
$am = new abilityModifer();

if ($user['statRolls'] !== '5'){
    $allowRolls = true;
} else {
    $allowRolls = false;
}

var_dump($_POST);

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
                <div class="col-lg-6">
                    <h4>
                        Character Info
                    </h4>
                    <button data-uname="<?php echo $uname; ?>" id="reroll" class="btn-success button left">ReRoll (<?php echo 5 - $user['statRolls']?> left)</button>

                    <div class="col-lg-5 fa-border left">
                        <?php
                        foreach ($user['stats'] as $key => $st){
                            echo "<ul>$key: $st -- Mod: ".$am->getAbilityModifer($st)."</ul>";
                        }
                        ?>
                        <hr>
                        <?php
                        echo "<ul>Exp: $exp</ul>";
                        echo "<ul>Level: $lvl</ul>";
                        echo "<ul>Gold: $gold</ul>";
                        echo "<ul>Alignment: $align</ul>";
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 right">
                    <h4>
                        Inventory
                    </h4>
                    <div class="col-lg-6 fa-border right">
                        <?php
                        foreach($user['inv'] as $key => $item) {
                            echo "<ul>$key: $item</ul>";
                        }
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

    <script>
        $(document).ready(function(){
            $('#reroll').click(function(){
                var uname = $(this).data('uname');
                var ajaxurl = '../php/reroll.php',
                    data =  {'uname': uname};
                $.post(ajaxurl, data, function (response) {
                    // Response div goes here.
                    alert("Your stats have been rerolled, please refresh");
                });
            });

        });
    </script>
</body>

</html>
