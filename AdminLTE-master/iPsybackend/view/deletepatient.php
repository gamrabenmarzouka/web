<?PHP
	include_once "../controller/patientC.php";
	
	$patient=new patientC();

    $patient->deletepatient($_POST["id"]);
        
      
	session_start();
session_destroy();
header('Location:index.php');
?>