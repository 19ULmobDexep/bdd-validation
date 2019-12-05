<?php
if(!empty($_POST) && isset($_POST)){
    include 'connection.php';

    $query = "UPDATE utilisateurs SET name = :name, email = :email, password = :password, phone = :phone WHERE id = :utilisateur_id";

    $updateUtilisateur = $dbConnection->prepare($query);


    $updateUtilisateur->bindParam(":name", $_POST['name']);
    $updateUtilisateur->bindParam(":email", $_POST['email']);
    $updateUtilisateur->bindParam(":password", $_POST['password']);
    $updateUtilisateur->bindParam(":phone", $_POST['phone']);
    $updateUtilisateur->bindParam(":utilisateur_id", $_POST['utilisateur_id']);

    $updateUtilisateur->execute();

    header('Location: list.php');


} else{
    header('Location: list.php');

}