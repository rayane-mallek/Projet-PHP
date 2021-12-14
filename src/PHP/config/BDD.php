<?php

$host = "webinfo";
$dbname = "mallekr";
$password = "mallekr";
$username = "mallekr";

try {  
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);    
  	} 
  catch (PDOException $e) {
  
    die("Probleme SQL $dbname :" . $e->getMessage());
    
  }

?>
