<?php 
          $conn = mysqli_connect("localhost", "root","" ,"projet");
          if (!$conn) {
          die("Connection failed: " . $conn-> connect_error);
          }
          if (isset($_GET['id'])) {

          $quizid = $_GET['id'];
          $q=mysqli_query($conn,"SELECT * FROM question WHERE idquiz='$quizid' " );
            while($row=mysqli_fetch_array($q) )
                        {
                        $qid=$row['idquest'];
                         $sql1 = "DELETE FROM `reponse` WHERE `idquest`= '$qid';";
            			  $result = $conn-> query($sql1);

            			  $sql2 = "DELETE FROM `options` WHERE `idquest`= '$qid';";
            			  $result = $conn-> query($sql2);
                        }
          $sql3 = "DELETE FROM `question` WHERE `idquiz`= '$quizid';";
          $result = $conn-> query($sql3);

          $sql4 = "DELETE FROM `quiz` WHERE `idquiz`= '$quizid';";
          $result = $conn-> query($sql4);
          header("location:index.php"); 
      }
?>