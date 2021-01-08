<?php
	include_once "../controller/psyC.php";
	include_once '../model/psy.php';

	$psyC=new psyC();
	
	

		
        $psy = new Psy($_POST['nom'], $_POST['prénom'], $_POST['email'], $_POST['mdp'], $_POST['adresse'], $_POST['spécialité'], $_POST['role']);
        echo"aaaaa";    $psyC->modifierpsy($psy, $_GET['id']);
          header('refresh:5;url=blog gestion profil.php');
    
      
     
    
?>
