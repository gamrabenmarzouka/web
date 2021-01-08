<?php
ob_start();
session_start();
?>
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
  <link href="../assets/css/style.css?1422585377" rel="stylesheet" type="text/css"/>
    
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
                    <a class="page-scroll" href="#home">Home</a>
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
  


    <div class="wrapper">
      <div class="title">
Quiz test</div>

<form name="form1" onsubmit="return validateForm()" action="modifier.php" method="post">
    <?php 
          $conn = mysqli_connect("localhost", "root","" ,"projet");
          if (!$conn) {
          die("Connection failed: " . $conn-> connect_error);
          }
          $ques_id = $_GET['id'];
          $sql = "SELECT * FROM `quiz` WHERE `idquiz`= '$ques_id';";
          $result = $conn-> query($sql);
          if (!$result) {
          trigger_error('Invalid query: ' . $conn->error);
          }
          if($result-> num_rows > 0){
            while ($row = $result -> fetch_assoc()){
              $x=$row["nbrques"];
            }}
             $sql = "SELECT * FROM `question` WHERE `idquiz`= '$ques_id';";
            $result = $conn-> query($sql);
             while ($row = $result->fetch_assoc()) {
             $qid=$row['idquest'];
             $test_quest[]=$row["textt"];
             $id_ques[]=$row['idquest'];

              $q=mysqli_query($conn,"SELECT * FROM options WHERE idquest='$qid' " );
            while($row=mysqli_fetch_array($q) )
                        {
                          $test_opt[]=$row["textt"];
                          $id_opt[]=$row['idoption'];
                        }

           }
           
           $y=0;
              for($i=1;$i<=$x;$i++) {
                  
    echo "<div class=field>";
              echo' <input type="hidden" name="idquiz" value='.$ques_id.'>';
              echo' <input id="idqui'.$i.'" type="hidden" name="idqui'.$i.'" value='.$id_ques[$i-1].'>';
              echo '<input id="qns'.$i.'" type="text" name="qns'.$i.'" value="'.$test_quest[$i-1].'">';
              echo '<label>Question['.$i.']</label>';
            echo '</div>';
            if ($i >= 2){
              $y=$y + 3;
            }
            else
            {
              $y=$i;
            }
   echo '<div class="field">';
              echo' <input  id="idop'.$i.'1" type="hidden" name="idop'.$i.'1" value="'.$id_opt[$y-1].'">';
              echo '<input id="'.$i.'1" type="text" name="'.$i.'1" value="'.$test_opt[$y-1].'">';
              echo "<label>Option 1</label>";
           echo " </div>";
    
   
    echo '<div class="field">';
              echo' <input  id="idop'.$i.'2" type="hidden" name="idop'.$i.'2" value="'.$id_opt[$y].'">';
              echo '<input id="'.$i.'2" type="text" name="'.$i.'2" value="'.$test_opt[$y].'">';
              echo "<label>Option 2</label>";
         echo "   </div>";

    echo '<div class="field">';
              echo' <input  id="idop'.$i.'3" type="hidden" name="idop'.$i.'3" value="'.$id_opt[$y+1].'">';
              echo '<input id="'.$i.'3" type="text" name="'.$i.'3" value="'.$test_opt[$y+1].'">';
              echo "<label>Option 3</label>";
           echo " </div>"; 
    
           
             $sql = "SELECT idoption FROM reponse";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
              $qcheck[]=$row['idoption'];
              }
       


          if(in_array($id_opt[$y-1],$qcheck)){
            echo '<div class="field" style="width:200px;">';
             echo " <h1>La bonne Reponse:</h1>";
            echo ' <select id="ans'.$i.'" name="ans'.$i.'">';

          echo '<option value="a">Select answer for question '.$i.'</option>';
          echo '<option value="a" selected>Option 1</option>
                <option value="b">Option 2</option>
                <option value="c">Option 3</option>';
          echo '</select>
                 </div>';
                       
          }elseif (in_array($id_opt[$y],$qcheck)){ 
            echo '<div class="field" style="width:200px;">';
             echo " <h1>La bonne Reponse:</h1>";
            echo ' <select id="ans'.$i.'" name="ans'.$i.'">';

          echo '<option value="a">Select answer for question '.$i.'</option>';

          echo '<option value="a" >Option 1</option>
                <option value="b" selected>Option 2</option>
                <option value="c">Option 3</option>';
          echo '</select>
                 </div>';      

          }elseif (in_array($id_opt[$y+1],$qcheck)){ 
            echo '<div class="field" style="width:200px;">';
             echo " <h1>La bonne Reponse:</h1>";
            echo ' <select id="ans'.$i.'" name="ans'.$i.'">';

          echo '<option value="a">Select answer for question '.$i.'</option>';

          echo '<option value="a" >Option 1</option>
                <option value="b">Option 2</option>
                <option value="c" selected>Option 3</option>';
          echo '</select>
                 </div>';      
          }      

                
        }

         ?>
   <div class="field">
              <input type="submit" name="Confirmer" value="Confirmer">
            </div>
  </form>
</div>
<?php 
      
      $conn = mysqli_connect("localhost", "root","" ,"projet");
      if (!$conn) {
           die("Connection failed: " . $conn-> connect_error);
              }
      if(isset($_POST['Confirmer']))
         {
          $ques_id = $_POST['idquiz'] ;
          //nbrques
          $sql = "SELECT * FROM `quiz` WHERE `idquiz`= '$ques_id';";
          $result = $conn-> query($sql);
          if (!$result) {
          trigger_error('Invalid query: ' . $conn->error);
          }
          if($result-> num_rows > 0){
            while ($row = $result -> fetch_assoc()){
              $nbr=$row["nbrques"];
            }}
          //question
          
            //idquiz
          
              $idqui=$_POST['idquiz'];
            

          
              //lop


           for ($i = 1; $i <= $nbr ; $i++) {

            $qns=$_POST['qns'.$i];
            $idquestt=$_POST['idqui'.$i];
 
              //question
            
          $q3 = "UPDATE `question` SET `textt`='$qns' WHERE `idquest`='$idquestt'";
          $result = mysqli_query($conn,$q3);
                
                     
                     //id question
          /*$sql3 = "SELECT  idquest from question ORDER by idquest DESC LIMIT 1;";
          $result = $conn-> query($sql3);
          if (!$result) {
          trigger_error('Invalid query: ' . $conn->error);
          }
          if($result-> num_rows > 0){
            while ($row = $result -> fetch_assoc()){
              $idd=$row["idquest"];
            }}*/

               //option
           $oaid=$_POST['idop'.$i.'1'];
           $obid=$_POST['idop'.$i.'2'];
           $ocid=$_POST['idop'.$i.'3']; 

           $a=$_POST[$i.'1'];
           $b=$_POST[$i.'2'];
           $c=$_POST[$i.'3'];

         
          
          $qa = "UPDATE `options` SET `textt`='$a' WHERE `idoption`='$oaid'";

          $result = mysqli_query($conn,$qa);
          
          
          $qb = "UPDATE `options` SET `textt`='$b' WHERE `idoption`='$obid'";

          $result = mysqli_query($conn,$qb);

         
          $qc = "UPDATE `options` SET `textt`='$c' WHERE `idoption`='$ocid'";

          $result = mysqli_query($conn,$qc);


        $e=$_POST['ans'.$i];
        switch($e)
        {
          case 'a': $ansid=$oaid; break;
          case 'b': $ansid=$obid; break;
          case 'c': $ansid=$ocid; break;
         
          default: $ansid=$oaid;
        }

         $qans = "UPDATE `reponse` SET `idoption`='$ansid' WHERE `idquest`='$idquestt'";

          $result = mysqli_query($conn,$qans);
         }

          header("location:index.php"); 

        }
          

?>


<style type="text/css">

h1 {
  text-align: left;
line-height: 22px;
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
display: inline-block;
max-width: 100%;
margin-bottom: 5px;

left: 20px;
font-weight: 400;
pointer-events: none;
transition: all 0.3s ease;
top: 0%;
font-size: 16px;
color: #4158d0;
transform: translateY(-50%);
  text-align: center;  
}
select{
    background-color: DodgerBlue;
}
select:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}
select.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}
button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}
button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

</style>




<script type="text/javascript">
function validateForm() {

var check = document.getElementsByTagName('input');
var len = check.length;
for(var i=0;i<len;i++) {
       if (check[i].value ==='')
       {
          alert('Remplir les cases vides');
          return false;
       }; 
     };

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
