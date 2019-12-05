<?php


include '../Templates/header.php';



?>


<div class="container">

    <h1>Enregistrer un nouvel utilisateur</h1>
  

        <form action="store.php" method="POST">

            <div class="form-group" >
                <label for="name">Name :</label>
                <input type="text"  class="form-control" required name="name">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text"  class="form-control" required name="email">
            </div>

            <div class="form-group">
                <label for="password">Password :</label>
                <input type="text"  class="form-control" required name="password">
            </div>
                
            <div class="form-group">
                <label for="phone">Phone :</label>
                <input  class="form-control" type="number" required name="phone">
            </div>
            

            <input class="btn btn-primary" type="submit" value="Enregistrer">
        </form>
</div>