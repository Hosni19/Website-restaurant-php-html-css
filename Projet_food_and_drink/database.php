<?php 
$servername = "localhost";
$username = "root";
$password = "";

try {
    $dbb = new PDO("mysql:host=$servername; dbname=menu restaurant", $username, $password);

     $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }


  ?>