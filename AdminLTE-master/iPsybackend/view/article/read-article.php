<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>eBusiness Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../../assets/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="../../assets/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="../../assets/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="../../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../assets/lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="../../assets/css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="../../assets/css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
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
                  <h1><span>i</span>PSYCONSULTING</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="../../assets/img/logo.png" alt="" title=""> -->
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
                  if (empty($_SESSION['m_un'])) { ?>


                  <?php } else if ($_SESSION['role'] == 1) {   ?>
                    <li> <a class="page-scroll" href="../quiz/view/index.php">Test</a></li>
                  <?php

                  } else if ($_SESSION['role'] == 0) {
                  ?>
                    <li> <a class="page-scroll" href="../quiz/view/index-user.php">Test</a></li>
                  <?php
                  }
                  ?>


                  <li>
                    <a class="page-scroll" href="../index.php#services">Article</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#team">Evenement</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="gestion profil.php">forum</a>
                  </li>

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
  include '../../config.php';
  include '../../model/categories.php';
  include '../../model/entities/article.php';
  include '../../model/article_category.php';
  include '../../model/article.php';
  $conn = new Config();
  $conn = $conn->getConnexion();

  $article_id = $_GET['article_id'];
  $article = CrudArticle::fetchById($conn, $article_id);
  $categories = CrudCatgeories::fetchByArticleId($conn, $article["id"]);

  ?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <h2><?= $article['name'] ?></h2>

    <div>
      <div><?= date('d M Y H:i', strtotime($article['created_at'])) ?></div>
      <div><small><strong><?= $article['slug'] ?></strong></small></div>
    </div>


    <div class="text-center">
      <img src="../../uploads/<?= $article["image_file"] ?>" alt="<?= $article["image_file"] ?>" style="max-width: 100%; ">
    </div>

    <div>
      <?= $article['content'] ?>
    </div>

    <div style="margin: 2em 0;">
      <a href="../index.php#article">Retour à la liste principale</a>
    </div>
  </div>


  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../../assets/lib/jquery/jquery.min.js"></script>
  <script src="../../assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../../assets/lib/venobox/venobox.min.js"></script>
  <script src="../../assets/lib/knob/jquery.knob.js"></script>
  <script src="../../assets/lib/wow/wow.min.js"></script>
  <script src="../../assets/lib/parallax/parallax.js"></script>
  <script src="../../assets/lib/easing/easing.min.js"></script>
  <script src="../../assets/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="../../assets/lib/appear/jquery.appear.js"></script>
  <script src="../../assets/lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../../assets/contactform/contactform.js"></script>

  <script src="../../assets/js/main.js"></script>
</body>

</html>