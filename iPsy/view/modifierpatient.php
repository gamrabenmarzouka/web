<?php
	include_once "../controller/patientC.php";
	include_once '../model/patient.php';

	$patientC=new patientC();
	
	

		
        $patient = new patient($_POST['nom'], $_POST['prénom'], $_POST['email'], $_POST['mdp'], $_POST['averti']);
           $patientC->modifierpatient($patient, $_GET['id']);
          header('refresh:5;url=gestion profilp.php');
    
      
     
    
?>
