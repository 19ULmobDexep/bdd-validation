<?php

include 'connection.php';



$query = "INSERT INTO utilisateurs (name, email, password, phone) VALUES (:name, :email, :password, :phone)";

$createUtilisateur = $dbConnection->prepare($query);


$createUtilisateur->bindParam(":name", $_POST['name']);
$createUtilisateur->bindParam(":email", $_POST['email']);
$createUtilisateur->bindParam(":password", $_POST['password']);
$createUtilisateur->bindParam(":phone", $_POST['phone']);

$createUtilisateur->execute();


header('Location: list.php');