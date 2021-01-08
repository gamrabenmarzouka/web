<?php
	include_once "../controller/psyC.php";
	include_once '../model/psy.php';
    session_start();

	$psyC=new psyC();
    if (
		isset($_POST["nom"]) && 
        isset($_POST["email"])
       
   
	){

		
        $psy = new Psy($_POST['nom'], $_POST['prénom'], $_POST['email'], $_POST['mdp'], $_POST['adresse'], $_POST['spécialité'], $_POST['role']);
        echo"aaaaa";    $psyC->modifierpsy($psy, $_SESSION['id']);
          header('refresh:5;url=blog gestion profil.php');
    
    }
     
    
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
    <script src="../assets/js/test.js"></script>


    <!-- Title Page-->
    <title>Mon compte</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../assets/css/main.css" rel="stylesheet" media="all">
    <style>
    .value {
        margin-left:500px;
    }
</style>
</head>

<body>

    <div class="page-wrapper bg-gra-03 p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Mon compte</h2>
                </div>
                <div class="card-body">
                <?php
  
  if (isset($_SESSION['id'])){
      $psy=$psyC->recupererpsy($_SESSION['id']);
  
  
  ?>
                    <form action="" method="POST">
                    <div class="form-row">
                    <input type="hidden" name="id" value=<?PHP echo $psy['id']; ?> name="id" disabeled>
                    </div>
                        <div class="form-row">
                            <div class="name">Nom :</div> 
                            <div class="value">
                                <input class="input--style-6" type="text" name="nom" value="<?PHP echo $psy['nom']; ?>">
                                <div id="erreur_nom" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Prénom :</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="prénom" value="<?PHP echo $psy['prenom']; ?>">
                                <div id="erreur_prénom" style="font-size:10px;font-weight: 40;"></div>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email :</div>
                            <div class="value">
                                <input class="input--style-6" type="email" name="email" value="<?PHP echo $psy['email']; ?>">
                                <div id="erreur_email" style="font-size:10px;font-weight: 40;"></div>

                            </div>                  
                        </div>
                        <div class="form-row">
                            <div class="name">Mot de pass :</div> 
                            <div class="value">
                                <input class="input--style-6" type="password" name="mdp" value="<?PHP echo $psy['mdp']; ?>">
                                <div id="erreur_mdp" style="font-size:10px;font-weight: 40;"></div>
                                

                            </div>           
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse :</div> 
                            <div class="value">
                                <input class="input--style-6" type="text" name="adresse" value="<?PHP echo $psy['adresse']; ?>">
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="name">Spécialité : </div> 
                            <div class="value">
                                <input class="input--style-6" type="text" name="spécialité" value="<?PHP echo $psy['specialite']; ?>">
                            </div>                          
                        </div>
                        <div class="form-row">
                            <div class="name">Role : </div> 
                            <div class="value">
                                <input class="input--style-6" type="hidden" name="role"value ="<?PHP echo $psy['role']; ?>">Psychologue
                            </div>                          
                        </div>
                    
                        <div class="card-footer">
                            <a class="btn btn--radius-2 btn--blue"style="margin-left:500px;" href="index.html" >Retourner à l'accueil</a> 
                        </div>
                        <div class="form-row">
                        <input type="submit" class="btn btn--radius-2 btn--red" name="sauvegarder" value="sauvegarder">

                        </div>
                        </div>
                    </form>
                    <div class="card-footer">                 
                            <form action="deletepsy.php" method="POST" >
                            <input type="submit" class="btn btn--radius-2 btn--red" name="supprimer" value="supprimer">
                            <input type="hidden" value=<?PHP echo $psy['id']; ?> name="id">
                            </form>
                    
                            </div>
                            <?php
                                        }?>
                </div>

               
            </div>
        </div>
    </div>



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
