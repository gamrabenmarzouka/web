<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>IPSY Consulting</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../assets/../assets/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
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
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>IPSY</span>Consulting</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                   <li class="active">
                    <a class="page-scroll" href="#accueil">accueil</a>
                  </li>
                  
                  <?php $type = $_GET['type'];
                  echo '<li class="active">
                    <a class="page-scroll" href="addtest.php?type='.$type.'">Ajouter Test</a>
                  </li>'
                  ?>
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

  <!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Test </h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Psychologique</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->
  <div class="blog-page area-padding"    >
    <div class="container">
      <div class="row">
        
        <!-- End left sidebar -->
        <?php 
        include_once "../config.php" ;

          $result = $conn->prepare("SELECT  * from quiz");
          $result->execute();
          $type = $_GET['type'];
          if($result){
            while ($row = $result -> fetch(PDO::FETCH_ASSOC)){
            	if ($row["type"]==$type&&$row["confirmation"]==1)
            	{
              echo'<div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="single-blog">
                <div class="blog-text">
                  <h4>
                    
                      <a href="#"><br>'.$row["title"].'</a>
                    </h4>
                  <p>'.$row["descrip"].'</p>
                </div>
                <span>
                    <a href="quiz.php?id='.$row["idquiz"].'" class="ready-btn" >Passer le test</a>
                    <a href="modifier.php?id='.$row["idquiz"].'" class="ready-btn">Modifier le test</a>
                    <a href="suprimer.php?id='.$row["idquiz"].'" class="ready-btn">Suprimer le test</a>
                  </span>
              </div>
            </div>';
       		 }
            }
    }
          
        ?>
        <!-- Start single blog -->
        
            <!-- End single blog -->
            
            <div class="blog-pagination">
              <ul class="pagination">
                <li><a href="#">&lt;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->

  <div class="clearfix"></div>

  <!-- Start Footer bottom Area -->
 

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script src="../assets/lib/wow/wow.min.js"></script>
  <script src="../assets/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  
  <script src="../assets/js/main.js"></script>
</body>
</html>
