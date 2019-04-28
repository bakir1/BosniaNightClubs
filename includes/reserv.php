<?php

include 'dbh.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
echo "Reserved successfully";

$sql = "INSERT INTO reservation (name, email, phone, message)
VALUES ('$name', '$email', '$phone', '$message')";

$sth = $conn->query($sql);

header("Location: ../reservation.php");

?>
