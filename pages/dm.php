<?php
//classmap without using composer autoload
include '../php/classmap.php';
include_once '../extra/nav.php';


$users = scandir('../chars/');
foreach ($users as $user){

   if(($user == '.') || ($user == '..') || ($user == 'template.json') || ($user == 'dm.json')) {
       $key = array_search($user, $users);
       unset($users[$key]);
   }


}

$template = json_decode(file_get_contents('../chars/template.json'));
$dm = json_decode(file_get_contents('../chars/dm.json'));

if ($dm->restMode == 1){
  $restMode = true;
} else {
  $restMode = false;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>510 -  DND Group DM</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">DM Page</h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h4>
                    Characters
                </h4>
                <div class="col-lg-12 fa-border left">
                    <?php
                    foreach ($users as $u){
                        $jsonUser = json_decode(file_get_contents("../chars/$u", true));
                        echo "<ul>".substr($u, 0, -5)." --- Character Name: ".$jsonUser->firstname." ".$jsonUser->lastname." -- Gold: ". $jsonUser->gold."g -- HP: ".$jsonUser->hp."</ul>";
                    }
                    ?>
                    <button id="giveGoldButton" data-toggle="modal" data-target="#giveGold" class="btn btn-warning">Give Gold</button>
                    <button id="giveExpButton" data-toggle="modal" data-target="#giveExp" class="btn btn-basic">Give Exp</button>
                    <button id="giveItemButton" data-toggle="modal" data-target="#manageInv" class="btn btn-primary">Give Items</button>
                    <button id="giveStatButton" data-toggle="modal" data-target="#giveStat" class="btn btn-primary">Add stats</button>
                    <button id="giveHpButton" data-toggle="modal" data-target="#modHealth" class="btn btn-primary">Modify HP</button>
                    <button id="toggleRestButton" data-toggle="modal" data-target="#toggleRest" class="btn btn-primary">Toggle Rest Mode</button>

                </div>
            </div>
            <div class="col-lg-6">
                <h4>
                    DM Log
                </h4>
                <div class="col-lg-12 fa-border left">
                  <textarea rows="30" readonly class="form-control dm-log"></textarea>
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


<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
<script src="../js/dataFormat.js"></script>
<script src="../js/dmActions.js"></script>
<?php include '../extra/dmModals.php'; ?>
</body>
</html>
