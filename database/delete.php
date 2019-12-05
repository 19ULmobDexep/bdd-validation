<?php

include 'connection.php';

$query = "DELETE FROM utilisateurs WHERE id = :utilisateur_id";

$deleteUtilisateur = $dbConnection->prepare($query);



$deleteUtilisateur->bindParam(':utilisateur_id', $_POST['utilisateur_id']);


$deleteUtilisateur->execute();

header('Location: list.php');
