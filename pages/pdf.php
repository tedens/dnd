<?php

switch ($_SERVER['QUERY_STRING']){
  case "ph":
      $pdf = "Players Handbook";
      break;

  case "sl":
      $pdf = "Spell List";
      break;

  case "pr":
      $pdf = "Players Rules";
      break;
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

    <title>510 - Pdfs</title>

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
        <button type="button" class="btn btn-success" style="margin-right: 15px;margin-top: 10px;" data-toggle="modal" data-target="#tradeItem">Trade Items</button>
        <button type="button" class="btn btn-warning" style="margin-right: 15px;margin-top: 10px;" data-toggle="modal" data-target="#tradeGold">Trade Gold</button>


      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                  <li>
                    <a href="#" data-toggle="modal" data-target="#newUser"><i class="fa fa-plus-circle fa-fw"></i>New User</a>
                      <?php
                      foreach ($users as $u) {
                          echo '<a href="index.php?'.substr($u, 0, -5).'"><i class="fa fa-user fa-fw"></i>'. substr($u, 0, -5) .'</a>';
                      }
                      ?>
                  </li>
                  <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">PDFs</a>
                    <ul class="dropdown-menu">
                      <a href="pdf.php?ph">Players Handbook</a><br/>
                      <a href="pdf.php?sl">Spell List</a><br/>
                      <a href="pdf.php?pg">Players Guide</a><br/>
                    </ul>
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
                <h1 class="page-header"><?php echo $pdf; ?></h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
              <?php echo '<object data="/pdfs/'.$_SERVER['QUERY_STRING'].'.pdf" type="application/pdf" width="100%" height="700">'; ?>

                </object>
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
<?php include 'dmModals.php'; ?>
</body>
</html>
