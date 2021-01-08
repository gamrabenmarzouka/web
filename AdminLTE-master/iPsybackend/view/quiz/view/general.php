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
                  <a class="hidden-xs"  href="..\..\sign in.php">Se connecter</a>
                
                  <?php } else {   ?> 
                    <a class="hidden-xs"  href="..\..\signout.php">se d�connecter</a>
    

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
           <?php

          if (!empty($_SESSION['m_un'])) {?>

                        <div class="user-panel">
                    <div class="pull-left image">
                      <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                      <p><?php  echo $_SESSION['nom']; ?></p>

                      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                  </div>
       

  
                      <!-- navbar-collapse -->



        <script>
	        document.querySelector(".right ul li").addEventListener("click", function(){
		          this.classList.toggle("active");
	        });
        </script>
              
              <?php

}
?>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
           
            <li class="active treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Utilisateurs</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                      <?php

          if (!empty($_SESSION['m_un'])) {?>
            
              
              


              
              <ul class="treeview-menu">
                <li class="active"><a href="..\..\gestion profil.php"><i class="fa fa-circle-o"></i> Psy</a></li>
                <li><a href="..\..\gestion profilp.php"><i class="fa fa-circle-o"></i> Patient</a></li>
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
                <li class="active"><a href="general.php"><i class="fa fa-circle-o"></i> Test a Modifier</a></li>
                <li><a href="advanced.php"><i class="fa fa-circle-o"></i> Test a Confirmer</a></li>
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
                <li class="active"><a href="..\..\forms\admin_even.php"><i class="fa fa-circle-o"></i>gestion evenements</a></li>
              </ul>
            </li>
 <?php
              }
?>
           
            
            
 <li class="active treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Gestion des consultations</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <?php

          if (!empty($_SESSION['m_un'])) {?>

              <ul class="treeview-menu">
                <li class="active"><a href="../../article/research.php"><i class="fa fa-circle-o"></i>Liste des articles</a></li>
                <li><a href="../../categorie/research.php"><i class="fa fa-circle-o"></i>Liste des cat�gories</a></li>
              </ul>
            </li>
 <?php
              }
?>           
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Test Psychlogique
            <small>IPSYConsulting</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>
        <style>
.a {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.a2 {background-color: #f44336;} /* Blue */

</style>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
              <?php

          if (!empty($_SESSION['m_un'])) {?>
                <div class="box-header">
                  <h3 class="box-title">Test Free</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<?php 
          $conn = mysqli_connect("localhost", "root","" ,"projet");
          if (!$conn) {
          die("Connection failed: " . $conn-> connect_error);
          }
          $sql = "SELECT  * from quiz";
          $result = $conn-> query($sql);
          if (!$result) {
          trigger_error('Invalid query: ' . $conn->error);
          }
          
          if($result-> num_rows > 0){
            while ($row = $result -> fetch_assoc()){
              if ($row["type"]=="free"&&$row["confirmation"]==1)
              {
              echo'
              
          
                  <h4>
                    
                      <a href="#"><br>'.$row["title"].'</a>
                    </h4>
                  <p>'.$row["descrip"].'</p>
                  <span>
                  
                  
                    <a href="modifier.php?id='.$row["idquiz"].'" class="a">Modifier le test</a>
                    <a href="suprimer.php?id='.$row["idquiz"].'" class="a a2">Supprimer</a>
                    <a href="type_prem.php?id='.$row["idquiz"].'" class="a">Modifier le type</a>
                  </span>
                  <br>
               
                
              
           ';
           }
            }
          }
            ?>
                </div><!-- /.box-body -->



              </div><!-- /.box -->
            </div>
              
              <?php
              }
?>
              

             

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                <?php

          if (!empty($_SESSION['m_un'])) {?>
                  <h3 class="box-title">Test Premium</h3>
                </div><!-- /.box-header -->

                <div class="box-body">

                  <?php 
          $conn = mysqli_connect("localhost", "root","" ,"projet");
          if (!$conn) {
          die("Connection failed: " . $conn-> connect_error);
          }
          $sql = "SELECT  * from quiz";
          $result = $conn-> query($sql);
          if (!$result) {
          trigger_error('Invalid query: ' . $conn->error);
          }
          
          if($result-> num_rows > 0){
            while ($row = $result -> fetch_assoc()){
              if ($row["type"]=="prem"&&$row["confirmation"]==1)
              {
              echo'
              
          
                  <h4>
                    
                      <a href="#"><br>'.$row["title"].'</a>
                    </h4>
                  <p>'.$row["descrip"].'</p>
                  <span>
                  
                    <a href="modifier.php?id='.$row["idquiz"].'" class="a">Modifier le test</a>
                    <a href="suprimer.php?id='.$row["idquiz"].'" class="a a2">Supprimer</a>
                    <a href="type_free.php?id='.$row["idquiz"].'" class="a">Modifier le type</a>
                  </span>
                  <br>
               
                
              
           ';
           }
            }
          }
            ?>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
            <?php
              }
?>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="../assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
