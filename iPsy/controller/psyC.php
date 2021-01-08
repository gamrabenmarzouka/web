<?php
include_once "../model/psy.php" ;
include_once "../config.php";
class psyC
{
    public function ajouterpsy(string $nom,string $prenom,string $email,string $mdp,string $adresse,string $specialite)
    {$db=config::getConnexion();
       try{ $sql="INSERT INTO psy(nom,prenom,email, mdp,adresse,specialite,role)
        VALUES(:nom,:prenom,:email, :mdp,:adresse,:specialite, :role)";
    $query = $db->prepare($sql);
    $query->execute([
        'nom'=>$nom,
        'prenom'=>$prenom,
        'email'=>$email,
        'mdp'=>$mdp,
        'adresse'=>$adresse,
        'specialite'=>$specialite,
        'role'=>1
  ]);
        }catch(PDOException $e)
    {$e->getMessage();
            }
    }
    function afficherpsy(){

        $sql="SELECT * FROM psy";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }


    }
    public function deletepsy($id)
    {$db=config::getConnexion();
    try{

    $query=$db->prepare('DELETE FROM psy WHERE id= :id');
    $query->execute([
        'id'=>$id
    ]);
    echo $query->rowCount() . "records DELETED successfully";
  }catch(PDOException $e)
      {$e->getMessage();}
     }


     function recupererpsy($id){
        $sql="SELECT * from psy where id=$id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $psy=$query->fetch();
            return $psy;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }  




     function modifierpsy($psy, $id){
        
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE psy SET 
                 nom = :nom,
                 prenom = :prenom,
                 email = :email,
                 mdp =:mdp,
                 adresse = :adresse, 
                 specialite = :specialite
    
                WHERE id = :id'
            );
            $query->execute([
                'nom' => $psy->getNom(),
                'prenom' => $psy->getPrenom(),
                'email' => $psy->getEmail(),
                'mdp' => $psy->getMotdepass(),
                'adresse' => $psy->getAdresse(),
                'specialite' => $psy->getSpecialite(),
                'id' => $id
            ]);
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
      
    }
    
    function connexionAccount($Email,$Password) {
        $sql="SELECT * FROM psy WHERE email='" . $Email ."' and mdp= '". $Password."'";
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
        $sql="SELECT * from psy WHERE email='$Email'";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $psy=$query->fetch();
            if($psy==false)
            return 1;
            else return 0;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }   
 }
