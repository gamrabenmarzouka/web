<?php
include_once "../model/quiz.php" ;
include_once "../config.php";
class quizC
{
    public function ajouterquiz(string $title, string $descrip, int $confirmation,int $score,string $min,string $max,int $nbrques ,string $type)
    {$db=config::getConnexion();
       try{ $sql="INSERT INTO quiz ( title, descrip, confirmation, score, min, max, nbrques, type)
        VALUES(:title,:descrip,:confirmation, :score,:min,:max, :nbrques, :type)";
    $query = $db->prepare($sql);
    $query->execute([
        
        'title'=>$title,
        'descrip'=>$descrip,
        'confirmation'=>$confirmation,
        'score'=>$score,
        'min'=>$min,
        'max'=>$max,
        'nbrques'=>$nbrques,
        'type'=>$type

  ]);
        }catch(PDOException $e)
    {$e->getMessage();
            }
    }

     public function deletequiz($id)
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
 
    public function deletequiz($idquiz)
    $sql="SELECT * FROM question WHERE idquiz=$idquiz";
    $db = config::getConnexion();
    try{
            $query=$db->prepare($sql);
            $query->execute();

            while($row=mysqli_fetch_array($query) )

            {

            
			}
            
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
     }


     



     