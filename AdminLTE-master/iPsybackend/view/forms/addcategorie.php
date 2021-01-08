<?php


// Conection avec BD a Evenment
$objetPdo= new PDO ("mysql:host=localhost;dbname=projet","root","");

// préparation de la requéte d'insertion (sql)

$pdoStat= $objetPdo->prepare('SELECT * from categorie ');


// Conection avec BD a categorie
$objetPdo1= new PDO ("mysql:host=localhost;dbname=projet_web","root","");

// préparation de la requéte d'insertion (sql)

$pdoStat1= $objetPdo1->prepare('INSERT INTO categorie VALUES (NULL, :psy , :patient)');

$pdoStat1->bindValue (':psy',$_POST['psy'], PDO::PARAM_STR);
$pdoStat1->bindValue (':patient',$_POST['patient'], PDO::PARAM_STR);



?>