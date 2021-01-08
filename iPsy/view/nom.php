<?php
	include_once "../controller/psyC.php";
	include_once '../model/psy.php';

	$psyC=new psyC();
	
	

		
        $psy = new Psy($_POST['nom'], $_POST['prénom'], $_POST['email'], $_POST['mdp'], $_POST['adresse'], $_POST['spécialité'], $_POST['role']);
        echo"aaaaa";    $psyC->modifierpsy($psy, $_GET['id']);
         // header('refresh:5;url=blog manegment.php');
    
      
     
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <link href="../assets/img/favicon.png" rel="icon">
  <!--  <script src="../assets/js/test.js"></script>-->

    <!-- Title Page-->
    <title>Mon compte</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../assets/css/main.css" rel="stylesheet" media="all">

</head>

<body>
           
    <?php
  
    if (isset($_GET['id'])){
        $psy=$psyC->recupererpsy($_GET['id']);
        
    
    ?>
       
    <div class="page-wrapper bg-gra-03 p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Mon compte</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Nom :</div> 
                            <div class="value">
                                <input class="input--style-6"style="width:200px;" type="text" name="nom" id="nom"value = "<?php echo $psy['nom']; ?>">
                                <div id="erreur_nom" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                        </div>
                        <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue" type="submit" onclick="verif();">Sauvegarder</button>
                    <a class="btn btn--radius-2 btn--blue"  href="gestion profil.php">Mon compte</a> 

                </div>
                    </form>


                </div>

                                   <?php
		}
		?>
            </div>
        </div>

    </div>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->    