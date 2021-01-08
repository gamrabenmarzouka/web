

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
            <from name="formauto" methode="POST" action="">
                <input id="motcle" type="text" name="search" placeholder="Recherche par t'heme evenment.." >
                <input class="btfind" type="submit" name="submit" value="Recherche"> 
            </from>
        </div>
    </div>

    <div id="even">
       
            <?php
            
            if (isset($_POST['submit'])){
                $motcle = $_POST['search'];
                $reqSelect= ("SELECT * FROM `evenement` WHERE (theme_even = '$motcle') ") ;
               
             }else{
                $reqSelect=("SELECT * FROM evenement");
             }
              $connect = mysqli_connect ("localhost","root", "", "projet");
              $resultat= mysqli_query($connect,$reqSelect);
                 
                

             while ($even=mysqli_fetch_assoc ($resultat)):
            
            ?>
           
            
            <div id="auto">
                
                        <input type="hidden" name="idEven" value="<?= $even['id']?>">
                        <img src="images/evenement_2.png" alt=""> <br> 
                        <?php echo $even['theme_even'] ;?> <br>  
                        <?= $even['date']  ?> <br> 
                        <?= $even['lien_even']?>
                        <input type="submit" name="participant" value="Participant">
                        
                   
                    <p>nbr reston est <?= $even['nb_participant'] ?> </p>
                

            </div>

            <?php endwhile;
            
            if (isset ($_POST["pariticipant"]))  {
                $valeur = $even['nb_participant']-1;
                $reqSelect= ("UPDATE `evenement` set  nb_participant = '$valeur' WHERE id=:idEven ") ;
                $connect = mysqli_connect ("localhost","root", "", "projet");
                $resultat= mysqli_query($connect,$reqSelect);
                $even=mysqli_fetch_assoc($resultat);
                $valeur= $even;
            } 

            ?>
       

    </div>



</body>

</html>