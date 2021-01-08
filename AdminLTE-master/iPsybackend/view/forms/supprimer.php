<?php

// Conection avec BD a Evenment
$objetPdo= new PDO ("mysql:host=localhost;dbname=projet","root","");

// préparation de la requéte d'insertion (sql)

$pdoStat= $objetPdo->prepare('DELETE FROM evenement WHERE id=:num ');

//Liaison du paramétre nommé
$pdoStat->bindValue (':num',$_GET['idEven'], PDO::PARAM_INT);


// vérification 
$pdoStat->execute();

header('location:admin_even.php');

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
</body>
</html> -->