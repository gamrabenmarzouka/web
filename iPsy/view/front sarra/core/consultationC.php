<?php
include_once "../config.php";


class consultationC
{

	/*function ajouter($consultation)
	{
		$db = config::getConnexion();
		$req=$db->prepare('INSERT  into consultation (id_patient,date_consultation,id_psy,tarif_consultation,etat) values (:id_patient,:date_consultation,:id_psy,:tarif_consultation,:etat)');
		
		

        $req->bindValue(':id_patient',$this->id_patient);
		$req->bindValue(':date_consultation',$this->date_consultation);
		$req->bindValue(':id_psy',$this->id_psy);
		$req->bindValue(':tarif_consultation',$this->tarif_consultation);
		$req->bindValue(':etat',$this->etat);
		
        $req->execute();
           
        

	}*/

	function ajouter($consultation){
		$sql="insert into consultation (id_patient,date_consultation,id_psy,tarif_consultation,etat) values ( :id_patient,:date_consultation,:id_psy,:tarif_consultation,'en cours')";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
    
        $id_patient=$consultation->get_id_patient();
        $date_consultation=$consultation->get_date_consultation();
        $id_psy=$consultation->get_id_psy();
        $tarif_consultation=$consultation->get_tarif_consultation();
        
            
		$req->bindValue(':id_patient',$id_patient);
		$req->bindValue(':date_consultation',$date_consultation);
		$req->bindValue(':id_psy',$id_psy);
    	$req->bindValue(':tarif_consultation',$tarif_consultation);
		

	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
    } 


	function recupererdernierID()
	{
		$sql="SELECT MAX(id_consulting) as max from consultation";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}


	
	
}
?>