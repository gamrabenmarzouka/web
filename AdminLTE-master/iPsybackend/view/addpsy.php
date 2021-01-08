<?php
include_once "../controller/psyC.php";

       $nom= $_POST['nom'];
       $prenom= $_POST['prénom'];
       $email= $_POST['email'];
       $mdp= $_POST['mdp'];
       $adresse= $_POST['adresse'];
       $specialite= $_POST['spécialité'];
       $role= $_POST['role'];



       
$test=new psyC();
$test->ajouterpsy($nom,$prenom,$email,$mdp,$adresse,$specialite,$role);
//header('Location:../../../index.php');

?>