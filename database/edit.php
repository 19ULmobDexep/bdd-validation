<?php

if(!empty($_POST) && isset($_POST)){

    include '../Templates/header.php';
    include 'connection.php';

    $query = "SELECT * FROM utilisateurs WHERE id = :utilisateur_id";

    $editUtilisateur = $dbConnection->prepare($query);

    $editUtilisateur->bindParam(":utilisateur_id", $_POST['utilisateur_id']);

    $editUtilisateur->execute();

    $utilisateur = $editUtilisateur->fetch();


    ?>


    <h1>MODIFIER L'UTILSATEUR</h1>

    <div class="container">
        <form action="update.php" method="POST">

            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">

            <div class="form-group" >
                <label for="name">Name:</label>
                <input type="text"  class="form-control" required name="name" value="<?php echo $utilisateur['name'] ?>">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text"  class="form-control" required name="email"  value="<?php echo $utilisateur['email'] ?>">
            </div>

            <div class="form-group">
                <label for="password">Password :</label>
                <input type="text"  class="form-control" required name="password"  value="<?php echo $utilisateur['password'] ?>">
            </div>
                
            <div class="form-group">
                <label for="phone"> Phone :</label>
                <input  class="form-control" type="number" required name="year"  value="<?php echo $utilisateur['phone'] ?>">
            </div>
            

            <input class="btn btn-primary" type="submit" value="Modifier">
        </form>
    </div>

<?php

} else{
    header('Location: list.php');
}
