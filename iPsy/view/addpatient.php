<?php
include_once "../controller/patientC.php";

       $nom= $_POST['nom'];
       $prenom= $_POST['prénom'];
       $email= $_POST['email'];
       $mdp= $_POST['mdp'];
       $averti= $_POST['averti'];




       
$test=new patientC();
$test->ajouterpatient($nom,$prenom,$email,$mdp,$averti);
header('Location: index.php');

?>