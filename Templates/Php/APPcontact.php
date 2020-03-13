<link rel="stylesheet" href="APP.css" type="text/css">

<?php


if(empty($_SESSION['messages'])) { 
    $_SESSION['messages'] = [] ;
}

if(!empty($_POST)) {
    var_dump($_POST) ;

}
if (!empty($_POST['text'])) {
    var_dump($_POST);
    $m = [
        "nom" => $_POST['text'], 
        "prénom"  => $_POST['text'],  
        "email"   => $_POST['text'],   
        "telephone" => $_POST['text'],
        
    ];
  
    array_push($_SESSION['messages'], $m) ;
}
//die ;
//var_dump($_POST);


include 'HeaderAPP.html';

?>


    <?php

if (empty($_POST['nom']) && count($_POST['prénom']) && count($_POST['email']) && count($_POST['telephone']) && count(['message'])) :?>
        // on affiche nos résultats
     <ul id="message">
            <?php foreach ($_SESSION['messages'] as $key => $text) :?>
                <li class="card">
                <div class="card-body"><?php echo $text['nom']; ?></div>
                <div class="card-footer"><?php echo $text['prénom']; ?></div>
                <div class="card-footer"><?php echo $text['email']; ?></div>
                <div class="card-footer"><?php echo $text['telephone']; ?></div>
                <div class="card-footer"><?php echo $text['message']; ?></div>
            </li>
        <?php endforeach ; ?>
    </ul>
<?php
endif
?>



<form action="APPcontact.php" method="POST">

    <h2> Formulaire </h2>
    <p>Vous désirez entrer en contact avec le gérant du site. Tapez vos coordonnées ci-dessous :</p>

    <div class="elem-group">
        <label for="nom">Nom :</label>
        <input type="text" id="Nom" name="Coordonnées[]" placeholder="Nom" required>
    </div>

    <div class="elem-group">
        <label for="prénom">Prénom :</label>
        <input type="text" id="Prénom" name="Coordonnées[]" placeholder="Prénom"required>
    </div>

    <div class="elem-group">
        <label for="email">Email :</label>
        <input type="text" id="Email" name="Coordonnées[]" placeholder="Email"  required>
    </div>

    <div class="elem-group">
        <label for="telephone">Téléphone :</label>
        <input type="text" id="Téléphone" name="Coordonnées[]" placeholder="N° Téléphone" required>
    </div>

    <div class="elem-group">
        <label for="message"> Message :</label>
        <textarea id="message" name="Coordonnées[]" placeholder="Dites ce que vous voulez"required></textarea>
    </div>

    <div class="elem-group">
        <button type="submit" name="envoi">Envoyer</button>
    </div>

</form>

<?php

include 'FooterAPP.html';