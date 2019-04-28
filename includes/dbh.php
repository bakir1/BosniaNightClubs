<?php

$servername = "localhost";
$username = "root";
$password = "";


  try {

$conn = new PDO("mysql:host=$servername;dbname=bnc", $username, $password);
 //set pdo error mode to exception -mora sad da radi :D -
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql="SELECT * FROM reserv";
}
 catch (PDOException $e) {
    echo "Connection failed: ".$e->getMessage();
  }


?>
