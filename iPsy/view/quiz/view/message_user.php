<?php
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>IPSY Consulting</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- Libraries CSS Files -->
  <link href="../assets/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!--  Slider Theme -->
  <link href="../assets/css/nivo-slider-theme.css" rel="stylesheet">
 <!-- Main Stylesheet File -->
  <link href="../assets/css/style.css?1422585377" rel="stylesheet" type="text/css"/>

  
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

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
                <a class="navbar-brand page-scroll sticky-logo" href="#">
                  <h1><span>IPSY</span>Consulting</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
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
                                        <a class="page-scroll" href="#team">Evenement</a>
                                      </li>
                                      <li>
                                        <a class="page-scroll" href="gestion profil.php">forum</a>
                                      </li>

                                      <?php

                    if (empty($_SESSION['m_un'])) {?>
                                      <li> <a class="page-scroll"  href="..\..\sign in.php">Se connecter</a></li>
    
                    <?php } else if ($_SESSION['role']==1){   ?> 
                                        <li> <a class="page-scroll"></a> <?php include "..\..\logged.php"; ?></a></li>
    

                    <?php

                    }else if ($_SESSION['role']==0){  
                    ?>
                      <li> <a class="page-scroll"></a> <?php include "..\..\loggedp.php"; ?></a></li>
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
<?php 
             include_once "../config.php" ;

          

              $ques_id = $_GET['id'];
              $message = $_GET['message'];

              $result = $conn->prepare("SELECT * FROM `quiz` WHERE `idquiz`= '$ques_id'");
          $result->execute();
              

              while ($row = $result -> fetch(PDO::FETCH_ASSOC)) {
                $messag=$row["$message"];
              }
              //echo '<h2>'.$ques_id.'</h2>';
              //echo '<h2>'.$message.'</h2>';
              ?>
  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="../assets/img/slider/slider1.jpg" alt="" title="#slider-direction-1" />
        <img src="../assets/img/slider/slider2.jpg" alt="" title="#slider-direction-2" />
        <img src="../assets/img/slider/slider3.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->

      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1" style="color:red">Resultat de votre test : </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2"><?php echo"$messag"; ?></h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="user.php?type=prem">Test Premium</a>
                  <a class="ready-btn page-scroll" href="user.php?type=free">Test Free</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">

                  <h2 class="title1">Resultat de votre test :  </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2"><?php echo"$messag"; ?></h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="user.php?type=prem">Test Premium</a>
                  <a class="ready-btn page-scroll" href="user.php?type=free">Test Free</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1" style="color:red" >Resultat de votre test :  </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2"><?php echo"$messag"; ?></h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="user.php?type=prem">Test Premium</a>
                  <a class="ready-btn page-scroll" href="user.php?type=free">Test Free</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>  
  


  <!-- JavaScript Libraris -->
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script src="../assets/lib/wow/wow.min.js"></script>
  <script src="../assets/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  
  <script src="../assets/js/main.js"></script>
</body>

</html>
