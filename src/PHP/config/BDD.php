<?php

$host = "webinfo";
$dbname = "gaidot";
$password = "passedemot";
$username = "gaidot";

try {  
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);    
  	} 
  catch (PDOException $e) {
  
    die("Probleme SQL $dbname :" . $e->getMessage());
    
  }

?>