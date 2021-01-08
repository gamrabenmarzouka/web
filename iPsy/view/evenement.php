<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eBusiness Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900
" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../assets/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="../assets/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="../assets/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../assets/lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="../assets/css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="../assets/css/responsive.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap
" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/

    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/

  ======================================================= -->
</head>
<body>
<header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>i</span>PSYCONSULTING</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="../assets/img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Accueil</a>
                  </li>
                  
                  <?php
                  session_start();
if (empty($_SESSION['m_un'])) {?>
                  
    
<?php } else if ($_SESSION['role']==1){   ?> 
                    <li> <a class="page-scroll" href="quiz\view\index.php">Test</a></li>
    

<?php

}else if ($_SESSION['role']==0){  
?>
  <li> <a class="page-scroll" href="quiz\view\index-user.php">Test</a></li>
  <?php

}
?>
                    
                  
                  <li>
                    <a class="page-scroll" href="#services">Article</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="evenement.php">Evenement</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="gestion profil.php">forum</a>
                  </li>

                  <?php

if (empty($_SESSION['m_un'])) {?>
                  <li> <a class="page-scroll"  href="sign in.php">Se connecter</a></li>
    
<?php } else if ($_SESSION['role']==1){   ?> 
                    <li> <a class="page-scroll"></a> <?php include "logged.php"; ?></a></li>
    

<?php

}else if ($_SESSION['role']==0){  
?>
  <li> <a class="page-scroll"></a> <?php include "loggedp.php"; ?></a></li>
  <?php

}
?>              

                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->
                    
    <div id="entete">
        <video autoplay="autoplay" class="video_entete" >
            <source src="video.mp4" type="video/mp4" /> 
        </video>
        <p class="nomsite"> EVENEMENTS </p>
        <div id="formauto">
            <from name="formauto" methode="POST" action="">
                <input id="motcle" type="text" name="search" placeholder="Recherche par t'heme evenment.." >
                <input class="btfind" type="submit" name="submit" value="Recherche"> 
            </from>
        </div>
    </div>

    <div id="even">
       
            <?php
            
            if (isset($_POST['submit'])){
                $motcle = $_POST['search'];
                $reqSelect= ("SELECT * FROM evenement WHERE (theme_even = '$motcle') ") ;
               
             }else{
                $reqSelect=("SELECT * FROM evenement");
             }
              $connect = mysqli_connect ("localhost","root", "", "projet");
              $resultat= mysqli_query($connect,$reqSelect);
                 
                

             while ($even=mysqli_fetch_assoc($resultat)):
            
            ?>
           
            
            <div id="auto">
                
                        <input type="hidden" name="idEven" value="<?= $even['id']?>">
                        <img src="images/evenement_2.png" alt=""> <br> 
                        <?php echo $even['theme_even'] ;?> <br>  
                        <?= $even['date']  ?> <br> 
                        <?= $even['lien_even']?>
                        <input type="submit" name="participant" value="Participant">
                        
                   
                    <p>nbr reston est <?= $even['nb_participant'] ?> </p>
                

            </div>

            <?php endwhile;
            
            if (isset ($_POST["pariticipant"]))  {
                $valeur = $even['nb_participant']-1;
                $reqSelect= ("UPDATE evenement set  nb_participant = '$valeur' WHERE id=:idEven ") ;
                $connect = mysqli_connect ("localhost","root", "", "projet");
                $resultat= mysqli_query($connect,$reqSelect);
                $even=mysqli_fetch_assoc($resultat);
                $valeur= $even;
            } 

            ?>
       

    </div>



</body>

</html>