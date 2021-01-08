<?php
  
// Conection avec BD a Evenment
$objetPdo= new PDO ("mysql:host=localhost;dbname=projet","root","");

// préparation de la requéte d'insertion (sql)

$pdoStat= $objetPdo->prepare('INSERT INTO evenement VALUES (NULL, :nom , :theme_even, :date ,:nb_participant , :type_even, :lien_even)');

// On lie chaque marqueur à une valeur



    $pdoStat->bindValue (':nom',isset($_POST['nom']), PDO::PARAM_STR);
    $pdoStat->bindValue (':theme_even',isset($_POST['theme_even']), PDO::PARAM_STR);
    $pdoStat->bindValue(':date',isset($_POST['date']), PDO::PARAM_INT);
    $pdoStat->bindValue (':nb_participant',isset($_POST['nb_participant']), PDO::PARAM_INT);
    $pdoStat->bindValue (':type_even',isset($_POST['type_even']), PDO::PARAM_STR);
    $pdoStat->bindValue (':lien_even',isset($_POST['lien_even']), PDO::PARAM_STR);

    
        // $sql= "INSERT INTO evenement VALUES (:nom , :theme_even,:date , :nb_participant,:type_even, :lien_even)";
         
        // $stmt= $pdo->prepare($sql);
       
        // $stmt->execute();


        $pdoStat->execute();


        $name ="";
        $theme_even="";
        $date="";
        $nb_participant="";
        $type_even="";
        $lien_even="";
    

    
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Advanced form elements</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link rel="stylesheet" href="cc.css">
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="../../assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../../assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="../../assets/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="../../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="../../assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
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
                    <a class="hidden-xs"  href="..\..\signout.php">se déconnecter</a>
    

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
                      <img src="../../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                      <p><?php  echo $_SESSION['nom']; ?></p>

                     
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
           
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Utilisateurs</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
                      <?php

          if (!empty($_SESSION['m_un'])) {?>
            
              
              


              
              <ul class="treeview-menu">
                <li class="active"><a href="..\gestion profil.php"><i class="fa fa-circle-o"></i> Psy</a></li>
                <li><a href="..\gestion profilp.php"><i class="fa fa-circle-o"></i> Patient</a></li>
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
                <li class="active"><a href="..\quiz\view\general.php"><i class="fa fa-circle-o"></i> Test a Modifier</a></li>
                <li><a href="..\quiz\view\advanced.php"><i class="fa fa-circle-o"></i> Test a Confirmer</a></li>
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
                <li class="active"><a href="..\forms\admin_even.php"><i class="fa fa-circle-o"></i>gestion evenement</a></li>
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

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Evenement
            <small>IPSYConsulting</small>
          </h1>
         
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
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
               
                  <h3 class="box-title">Gestion evenement</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
                <section>
        <div class="add-even">
            <h1>Ajouter un evenement</h1>
            <div id="erreur"></div>
            
            <form action="" method="post" id="formulaire">
                <label for="">Nom</label>
                <input type="text" class="input-field" id="nom" onblur="verif();"   name="nom" placeholder="Entre votre nom">

                <label for="">Theme d'evenement </label>
                <input type="text" name="theme_even" id="theme_even" onblur="verif();" class="input-field">

                <label for="">Date:</label>
                <input type="date" name="date" id="dateNais" onblur="verif();" value="<?= str_replace (" " , date("D-M-Y")) ?>" class="input-field">

                <label for="">Nombre de participant</label>
                <input type="number" name="nb_participant" id="nb_participant" onblur="verif();" class="input-field">

                <label for="">type d'evenement</label>
                <input type="radio" name="type_even" id="type_even" value='psy' onblur="verif();"  class="input-fieldd"> <label for="">psy</label>
                <input type="radio" name="type_even" id="type_even" value='patient' onblur="verif();"  class="input-fieldd"><label for="">Patient</label>

                <label for="">Lien d'evenement</label>
                <input type="text" name="lien_even" id="lien_even" onblur="verif();" class="input-field">

                <div class="button">
        <a href="admin_even.php"> <button type="submit"  class="btn btn-secondary btn-lg">  Ajouter Evenement </button> </a>
        <a href="admin_even.php"> <button type="button" class="btn btn-secondary btn-lg" > Retour </button> </a>
    </div>
              
            </form>
        </div>
    </section>
               
                
              
         


                </div><!-- /.box-body -->

               

              </div><!-- /.box -->
            </div>
              

              

             

            </div><!--/.col (left) -->
            <!-- right column -->
        
                </div><!-- /.box-header -->
               

                 
              
          
                  
               
                
              
           
                  
         
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
    <script src="../../assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="../../assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="../../assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="../../assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="../../assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="../../assets/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="../../assets/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../../assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- Page script -->
    <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

  </body>
</html>
