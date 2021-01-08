<?php

// Conection avec BD a Evenment
$objetPdo= new PDO ("mysql:host=localhost;dbname=projet","root","");

// préparation de la requéte d'insertion (sql)

$pdoStat= $objetPdo->prepare('SELECT * FROM evenement WHERE id=:num ');

//Liaison du paramétre nommé
$pdoStat->bindValue (':num',$_GET['idEven'], PDO::PARAM_INT);

$pdoStat->execute();

// on récupére l'evenement
$even = $pdoStat->fetch();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="cc.css">
    <title>Ajouter Evenement</title>
    <script src="script.js"></script>
</head>
<body>
    <nav>
        <div class="logo">
            <h4>IPSY Consulting</h4>
        </div>
    </nav>


    <section>
        <div class="add-even">
            <h1>Ajouter un evenement</h1>
            <div id="erreur"></div>
            
            <form action="modifier.php" method="post" id="formulaire">
                <input type="hidden" name="idEven" value="<?= $even['id']?>">
                <label for="">Nom</label>
                <input type="text" class="input-field" id="nom"  onblur="verif();" name="nom" placeholder="Entre votre nom" value="<?= $even['nom']; ?>">

                <label for="">Theme d'evenement </label>
                <input type="text" name="theme_even" id="theme_even" class="input-field" value="<?= $even['theme_even']; ?>">

                <label for="">Date:</label>
                <input type="date" name="date" id="dateNais" class="input-field" value="<?= $even['date']; ?>">

                <label for="">Nombre de participant</label>
                <input type="number" name="nb_participant" id="nb_participant" class="input-field" value="<?= $even['nb_participant']; ?>">

                <label for="">type d'evenement</label>
                <input type="radio"  id="type_even" value='psy'  class="input-fieldd"> <label for="">psy</label>
                <input type="radio"  id="type_even" value='patient'  class="input-fieldd"><label for="">Patient</label>

                <label for="">Lien d'evenement</label>
                <input type="text" name="lien_even" id="lien_even" class="input-field" value="<?= $even['lien_even']; ?>">

                <div class="button">
         <button type="submit" class="btn btn-secondary btn-lg"> <a href="admin_even.php">  Enregistrer les modifications </a></button> 
        <a href="admin_even.php"> <button type="button" class="btn btn-secondary btn-lg" > Retour </button> </a>
    </div>
              
            </form>
        </div>
    </section>
