


<?PHP
include"../core/consultationC.php";
include "../entities/consultation.php";


    
    if (isset($_POST['id_patient']) and isset($_POST['id_psy'])  and isset($_POST['date_consultation']) and isset($_POST['tarif']))
 {   
  
        
           
$consultation1=new consultation($_POST['id_patient'],$_POST['id_psy'],$_POST['date_consultation'],$_POST['tarif']);
      
$consultation1C=new consultationC();

$consultation1C->ajouter($consultation1);}
 //header('Location: inscrit.php');
        
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3

 
   

//*/

?>