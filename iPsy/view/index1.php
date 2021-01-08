<?php
// Conection avec BD a Evenment
$objetPdo= new PDO ("mysql:host=localhost;dbname=projet","root","");

// préparation de la requéte d'insertion (sql)

// $pdoStat= $objetPdo->prepare('SELECT * FROM evenement');

// $pdoStat->execute();

// $evenements= $pdoStat->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Evenements</title>
</head>
<body>
                    
    <div id="entete">
        <video autoplay="autoplay" class="video_entete" >
            <source src="video.mp4" type="video/mp4" /> 
        </video>
        <p class="nomsite"> EVENEMENTS </p>
        <div id="formauto">
            <from name="formauto" methode="POST">
                <input id="motcle" type="text" name="motcle" placeholder="Recherche par t'heme evenment.." >
                <input class="btfind" type="submit" name="btsubmit" value="Recherche"> 
            </from>
        </div>
    </div>

    <div id="even">
        <?php
        if (isset($_POST['btsubmit'])){
           $mc=$_POST['motcle'];
         $pdoStat= $objetPdo->prepare("SELECT * FROM evenement WHERE theme_even LIKE '$mc' ");
         $pdoStat->setFetchMode(PDO:: FETCH_OBJ);
         $pdoStat->execute();
        }
         
        $evenements= $pdoStat->fetch();
        foreach ($evenements as $even) {
        ?>

           
            
            <div id="auto">
                <from name="formauto" methode="POST">
                        <img src="images/evenement_2.png" alt=""> <br> 
                        <?= $even['theme_even']?> <br>  <?= $even['date']  ?> <br> <?= $even['lien_even']?>
                        <input type="hidden" name="idEven" value="<?= $even['id']?>">
                        <input type="submit" name="nb_participant" value="Participant">
                        
                    <?php
                        
                        if(!isset($_POST['nb_participant'])){
                        $nb= $even['nb_participant'];
                            
                            $pdoStat= $objetPdo->prepare('UPDATE evenement SET  nb_participant = $nb-1 WHERE id=:num' );
                            
                        
                            $pdoStat->execute();

                        }
                    ?>
                    <p>nbr reston est <?= $even['nb_participant'] ?> </p>
                </from>
            </div>

        <?php } ?>

    </div>



</body>

</html>