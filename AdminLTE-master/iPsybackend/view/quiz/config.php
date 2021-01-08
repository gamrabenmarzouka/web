<?php
$hostname='localhost';
$username='root';
$password='';

try {
    $conn = new PDO("mysql:host=$hostname;dbname=projet",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
    echo 'Connected to Database<br/>';

    
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?> 