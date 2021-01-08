<?php
include_once "../model/patient.php" ;
include_once "../config.php";
class patientC
{
    public function ajouterpatient(string $nom,string $prenom,string $email,string $mdp)
    {$db=config::getConnexion();
       try{ $sql="INSERT INTO patient(nom,prenom,email, mdp,role)
        VALUES(:nom,:prenom,:email, :mdp,:role)";
    $query = $db->prepare($sql);
    $query->execute([
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'mdp'=>$mdp,
        'role'=>0

  ]);
        }catch(PDOException $e)
    {$e->getMessage();
            }
    }
    function afficherpatient(){

        $sql="SELECT * FROM patient";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }


    }
    public function deletepatient($id)
    {$db=config::getConnexion();
    try{

    $query=$db->prepare('DELETE FROM patient WHERE id= :id');
    $query->execute([
        'id'=>$id
    ]);
    echo $query->rowCount() . "records DELETED successfully";
  }catch(PDOException $e)
      {$e->getMessage();}
     }


     function recupererpatient($id){
        $sql="SELECT * from patient where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $patient=$query->fetch();
            return $patient;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }  




     function modifierpatient($patient, $id){
        
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE patient SET 
                 nom = :nom,
                 prenom = :prenom,
                 email = :email,
                 mdp =:mdp

    
                WHERE id = :id'
            );
            $query->execute([
                'nom' => $patient->getNom(),
                'prenom' => $patient->getPrenom(),
                'email' => $patient->getEmail(),
                'mdp' => $patient->getMotdepass(),


                'id' => $id
            ]);
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
      
    }
    
    function connexionAccount($Email,$Password) {
        $sql="SELECT * FROM patient WHERE email='" . $Email ."' and mdp= '". $Password."'";
        $db = config::getConnexion();
        
        

        try {
            $query=$db->prepare($sql);

            
            $query->execute();
            $count=$query->rowCount();
            if($count==0)
            {$message= "pseudo ou mot de passe incorrect";
            
            }
            else { 
                $x = $query->fetch();
                $message = $x['role'];
              

             session_start(); 
    $_SESSION['id']= $x['id'];
    $_SESSION['nom']=$x['nom'];
    $_SESSION['role']=$x['role'];
    
            }
        }            catch (Exception $e)
        {
            $message= " ".$e->getMessage();        
            }
            return $message;
    }
  
    function chercherEmail($Email){
        $sql="SELECT * from patient WHERE email='$Email'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $patient=$query->fetch();
            if($patient==false)
            return 1;
            else return 0;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }   
 }
