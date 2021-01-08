<?PHP
	include_once "../controller/psyC.php";
	
	$psy=new psyC();

    $psy->deletepsy($_POST["id"]);
        
      
	
header('Location:index.html');
?>