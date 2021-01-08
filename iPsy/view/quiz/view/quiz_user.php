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
                  <!-- button menu
                  <li>
                    <a class="page-scroll" href="#about">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Services</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#team">Team</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#portfolio">Portfolio</a>
                  </li>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href=# >Drop Down 1</a></li>
                      <li><a href=# >Drop Down 2</a></li>
                    </ul> 
                  </li>

                  <li>
                    <a class="page-scroll" href="#blog">Blog</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                  </li>-->
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
  <div class="blog-page area-padding"    >
    <div class="container">
      <div class="row">
  <!-- Start Slider Area -->
   <div class="quiz_box">
  <form action="quiz_user.php" method="post">
            <section >
           <?php 
		          include_once "../config.php" ;


		          $ques_id = $_GET['id'];

		          $result = $conn->prepare("SELECT * FROM `question` WHERE `idquiz`= '$ques_id'");
                  $result->execute();
		          if ($result) {
		    $x=0;
		    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $x++;
             $qid=$row['idquest'];
            echo '<div class="que_text">
                <span style="color:blue;font-weight:bold;font-size: 20px">'.$x.'-'.$row["textt"].' </span>
            </div>';
            
            $result1 = $conn->prepare("SELECT * FROM options WHERE idquest='$qid' ");
            $result1->execute();
            while($row=$result1->fetch(PDO::FETCH_BOTH))
                        {
           echo' <br>';
           echo '<label class="container" style="color:darkolivegreene;font-style: italic;font-size: 15px">'.$row["textt"].'';
          echo' <input type="hidden" name="idquiz" value='.$ques_id.'>';
			  echo '<input type="checkbox" name="checkbox[]" id="radioo"  value='.$row["idoption"].' >';
			 echo ' <span class="checkmark"></span>
			</label>
			
			 ';
			}
		}
		}
			 ?>

			   <br><br><br>
			   
                <input type="submit" value="Resultat" name="submit">
                </section>
                </form>
</div>
        </div>
      </div>
       </div>
<?php
$result = $conn->prepare("SELECT idoption FROM reponse");
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$qcheck[]=$row['idoption'];
}
$resulta=0;
if(isset($_POST['checkbox'])){
	
	$check =$_POST['checkbox'] ;
	$ques_id = $_POST['idquiz'] ;


foreach($check as $name)
{
    if(in_array($name,$qcheck)){
       $resulta=$resulta+1;


    } else {
        
    }
}

$result = $conn->prepare("SELECT score FROM `quiz`WHERE `idquiz`= '$ques_id'");
$result->execute();



while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		          	$score=$row['score'];
		          	print_r($score);
		          	print_r($resulta);
		          	if ($score <= $resulta){
		          	$lien='location:message_user.php?id='.$ques_id.'&message=max';
		          	}else{
		          	$lien ='location:message_user.php?id='.$ques_id.'&message=min';
		          	}
		          }
	    header($lien);
}

?>             


<style>
/* The container */
input[type="submit"] {
    color: #fff; 
    border: none; 
    padding-left: 0; 
    margin-top: -1000px; 
    font-size: 20px; 
    font-weight: 500; 
    cursor: pointer; 
    background: linear-gradient(-135deg, #c850c0, #4158d0); 
    transition: all 0.3s ease; 
}
input[type="submit"]:focus{
    border-color: #4158d0;
}
input[type="submit"] {
    height: 80px;
    width: 100%;
    outline: none;
    font-size: 17px;
    padding-left: 20px;
    border: 1px solid lightgrey;
    border-radius: 25px;
    transition: all 0.3s ease;
    -webkit-appearance: button;
    cursor: pointer;
    font-family: inherit;
    font-size: 40px;
    line-height: inherit;

}

.container {
  display: block;
  position: relative;
  margin-top: -10px;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */


.container input:not([type="submit"]) {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
 
}
/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);


.quiz_box{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 
                0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.quiz_box{
    width: 1000px;
    background: #fff;
    border-radius: 5px;
    margin-top: -1000px;
    transform: translate(-50%, -50%) scale(0.9);
    }

.quiz_box header{
    position: relative;
    z-index: 2;
    height: 70px;
    padding: 0 30px;
    background: #fff;
    border-radius: 5px 5px 0 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0px 3px 5px 1px rgba(0,0,0,0.1);
}

.quiz_box header .title{
    font-size: 20px;
    font-weight: 600;
}

.quiz_box header .timer{
    color: #004085;
    background: #cce5ff;
    border: 1px solid #b8daff;
    height: 45px;
    padding: 0 8px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 145px;
}

.quiz_box header .timer .time_left_txt{
    font-weight: 400;
    font-size: 17px;
    user-select: none;
}

.quiz_box header .timer .timer_sec{
    font-size: 18px;
    font-weight: 500;
    height: 30px;
    width: 45px;
    color: #fff;
    border-radius: 5px;
    line-height: 30px;
    text-align: center;
    background: #343a40;
    border: 1px solid #343a40;
    user-select: none;
}

.quiz_box header .time_line{
    position: absolute;
    bottom: 0px;
    left: 0px;
    height: 3px;
    background: #007bff;
}



}
</style>     

  <!-- JavaScript Libraris -->
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script src="../assets/lib/wow/wow.min.js"></script>
  <script src="../assets/../assets/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  
  <script src="../assets/js/main.js"></script>
</body>

</html>
