<?php


include '../Templates/header.php';
include 'connection.php';

$query = 'SELECT * FROM utilisateurs';

$preparedQuery = $dbConnection->prepare($query);

$preparedQuery->execute();

$utilisateurs = $preparedQuery->fetchall();



?>

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>


<h1> LISTE DES UTILISATEURS </h1>
<h4>Tableau de base de données des utilisateurs</h4>

<table class="w3-table w3-striped w3-border">

    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Phone</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        <th scope="col">Rôle</th>
    </tr>

    <?php
            foreach($utilisateurs as $utilisateur){
            ?>
                <tr>         
                    <td><?php echo $utilisateur['name'];?></td>
                    <td><?php echo $utilisateur['email'];?></td>
                    <td><?php echo $utilisateur['password'];?></td>
                    <td><?php echo $utilisateur['phone'];?></td>
                    <td>
                        <form action="edit.php" method="POST">
                            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">
                            <input type="submit" value="Modifier">
                        </form>
                    </td>

                    <td>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">
                            <input type="submit" value="X">
                        </form>
                    </td>

                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">
                            <input type="submit" value="Voir">
                        </form>
                    </td>
                </tr>
        <?php
    }
?>
</table>