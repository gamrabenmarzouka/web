<?php 
      
      $conn = mysqli_connect("localhost", "root","" ,"projet");
      if (!$conn) {
           die("Connection failed: " . $conn-> connect_error);
              }
      if(isset($_GET['id']))
         {	$qns=1;
         	$idqui= $_GET['id'];
         	$q3 = "UPDATE `quiz` SET `type`='free' WHERE `idquiz`='$idqui'";
          $result = mysqli_query($conn,$q3);
          header("location:general.php"); 
      }







?>