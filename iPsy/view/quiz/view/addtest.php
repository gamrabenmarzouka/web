<!DOCTYPE html>

<html lang="en" dir="ltr">
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
  <link href="../assets/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!--  Slider Theme -->
  <link href="../assets/css/nivo-slider-theme.css" rel="stylesheet">
 <!-- Main Stylesheet File -->
  <link href="../assets/css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/styleadd.css">
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
                    <a class="page-scroll" href="index.php">Home</a>
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

  <!-- Start Bottom Header -->
  
<?php 

      $conn = mysqli_connect("localhost", "root","" ,"projet");
      if (!$conn) {
           die("Connection failed: " . $conn-> connect_error);
              }
      if(isset($_POST['Confirmer']))
         {
          $sql = "SELECT  * from quiz";
          $result = $conn-> query($sql);
          if (!$result) {
          trigger_error('Invalid query: ' . $conn->error);
          }
          
          $row = $result->fetch_array();
          
          $confirm=0;
          $typee = $_POST['typequiz'];
          echo'<h1>hello</h1>';

         $sql = "INSERT INTO quiz ( title, descrip, confirmation, score, min, max, nbrques, type)
          VALUES ('".$_POST["nom"]."','".$_POST["descrip"]."','$confirm','".$_POST["score"]."','".$_POST["min"]."','".$_POST["max"]."','".$_POST["nbrques"]."','$typee')";

          $result = mysqli_query($conn,$sql);
          header("location:inset_quest.php"); 
          }
?>

    <div class="wrapper">
      <div class="title">
Quiz test</div>
<form name="form1" onsubmit="return validateForm()" action="addtest.php" method="post">
        
    <div class="field">
              <input type="text" name="nom">
              <label>Titre de Quiz</label>
            </div>
    <div class="field">
              <input type="text" name="descrip">
              <label>Description</label>
            </div>
    <div class="field">
              <input type="number" name="nbrques" oninput="this.value = Math.round(this.value);">
              <?php $typee = $_GET['type'];
             echo' <input type="hidden" name="typequiz" value='.$typee.'>';
          ?>
              <label>Nombre des Questions </label>
            </div>
    <div class="field">
              <input type="number" name="score" >
              <label>Score minimum</label>
            </div>
    <div class="field">
              <input type="text" name="min">
              <label>Message d'echec</label>
            </div>
    <div class="field">
              <input type="text" name="max">
              <label>Message de réussite</label>
            </div>

    <div class="field">

        
              <input type="submit" name="Confirmer" value="Confirmer"  >
             
            </div>

</form>
</div>
<script type="text/javascript">
function validateForm() {
var empt = document.forms["form1"]["nom"].value;
var empt1 = document.forms["form1"]["descrip"].value;
var empt2 = document.forms["form1"]["nbrques"].value;
var empt3 = document.forms["form1"]["score"].value;
var empt4 = document.forms["form1"]["min"].value;
var empt5 = document.forms["form1"]["max"].value;
if (empt == "" || empt1 == "" || empt2 == "" || empt3 == "" || empt4 == "" || empt5 == "")
  {
alert("Please input a Value");
return false;
  }
}
</script>
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
