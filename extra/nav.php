<?php
$users = scandir('../chars/');

foreach ($users as $Player) {

    if (($Player == '.') || ($Player == '..') || ($Player == 'template.json') || ($Player == 'dm.json')) {
        $key = array_search($Player, $users);
        unset($users[$key]);
    }
}

 ?>

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
                    <a href="/pages/dm.php">DM Page</a>
                    <?php
                    foreach ($users as $u) {
                        echo '<a href="index.php?'.substr($u, 0, -5).'"><i class="fa fa-user fa-fw"></i>'. substr($u, 0, -5) .'</a>';
                    }
                    ?>
                </li>
                <li class="dropdown-submenu">
                  <a tabindex="-1" href="#"><i class="fa fa-file"></i> PDFs</a>
                  <ul class="dropdown-menu">
                    <a href="pdf.php?ph"><i class="fa fa-file" aria-hidden="true"></i> Players Handbook</a><br/>
                    <a href="pdf.php?sl"><i class="fa fa-file" aria-hidden="true"></i> Spell List</a><br/>
                    <a href="pdf.php?pg"><i class="fa fa-file" aria-hidden="true"></i> Players Guide</a><br/>
                  </ul>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
