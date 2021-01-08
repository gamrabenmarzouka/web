<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="../assets/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../assets/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><b>Admin</b>LTE</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         
                <?php
session_start();
if (empty($_SESSION['m_un'])) {?>
                  <a class="hidden-xs"  href="sign in.php">Se connecter</a>
                
                  <?php } else {   ?> 
                    <a class="hidden-xs"  href="signout.php">se déconnecter</a>
    

<?php

}
?>
   
</a>
                
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <?php

          if (!empty($_SESSION['m_un'])) {?>
            <?php include "logged.php"; ?>
              
              <?php

}
?>
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Utilisateurs</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                      <?php

          if (!empty($_SESSION['m_un'])) {?>
            
              
              


              
              <ul class="treeview-menu">
                <li class="active"><a href="gestion profil.php"><i class="fa fa-circle-o"></i> Psy</a></li>
                <li><a href="gestion profilp.php"><i class="fa fa-circle-o"></i> Patient</a></li>
              </ul>
              <?php
              }
?>
            </li>

            <li class="active treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Test</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <?php

          if (!empty($_SESSION['m_un'])) {?>

              <ul class="treeview-menu">
                <li class="active"><a href="quiz\view\general.php"><i class="fa fa-circle-o"></i> Test a Modifier</a></li>
                <li><a href="quiz\view\advanced.php"><i class="fa fa-circle-o"></i> Test a Confirmer</a></li>
              </ul>
            </li>
 <?php
              }
?>
  <li class="active treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>evenement</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <?php

          if (!empty($_SESSION['m_un'])) {?>

              <ul class="treeview-menu">
                <li class="active"><a href="forms\admin_even.php"><i class="fa fa-circle-o"></i>gestion evenement</a></li>
              </ul>
            </li>
 <?php
              }
?>
<li class="active treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Gestion des articles</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <?php

          if (!empty($_SESSION['m_un'])) {?>

              <ul class="treeview-menu">
                <li class="active"><a href="article/research.php"><i class="fa fa-circle-o"></i>Liste des articles</a></li>
                <li><a href="categorie/research.php"><i class="fa fa-circle-o"></i>Liste des catégories</a></li>
              </ul>
            </li>
 <?php
              }
?>
             </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

   
    </div><!-- ./wrapper -->


  </body>
</html>