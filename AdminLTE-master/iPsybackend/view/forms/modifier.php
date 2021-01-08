<?php

// Conection avec BD a Evenment
$objetPdo= new PDO ("mysql:host=localhost;dbname=projet_web","root","");


// préparation de la requéte d'insertion (sql)

$pdoStat= $objetPdo->prepare('UPDATE evenement SET nom = :nom , theme_even = :theme_even, date = :date , nb_participant = :nb_participant , type_even = :type_even, lien_even = :lien_even WHERE id=:num ');

//Liaison du paramétre nommé
    $pdoStat->bindValue (':num',$_POST['idEven'], PDO::PARAM_INT);
    $pdoStat->bindValue (':nom',$_POST['nom'], PDO::PARAM_STR);
    $pdoStat->bindValue (':theme_even',$_POST['theme_even'], PDO::PARAM_STR);
    $pdoStat->bindValue(':date',$_POST['date'], PDO::PARAM_INT);
    $pdoStat->bindValue (':nb_participant',$_POST['nb_participant'], PDO::PARAM_INT);
    // $pdoStat->bindValue (':type_even',$_POST['type_even'], PDO::PARAM_STR);
    $pdoStat->bindValue (':lien_even',$_POST['lien_even'], PDO::PARAM_STR);


$pdoStat->execute();

header("location:admin_even.php");
//vérification
// $executeItsOk= $pdoStat->execute();

// if($executeItsOk){
//     $message='enregistrement ';
// }else{
//     $message='echec!!';
// }


// 
?>


<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
</body>
</html>  -->