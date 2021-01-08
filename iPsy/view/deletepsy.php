<?PHP
	include_once "../controller/psyC.php";
	
	$psy=new psyC();

    $psy->deletepsy($_POST["id"]);
        
      
	session_start();
session_destroy();
header('Location:index.php');
?>