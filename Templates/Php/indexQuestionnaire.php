<?php




include 'header.html';


$step = 0 ;
if(!empty($_GET['step'])) {
    $step = intval($_GET['step']) ;
}
if($step === 0){
    ?>

            <h2>Etape 1 : Identité</h2>
        ​
                <form action="?step=1" method="POST">
                    <div>
                        <label for="Nom"> Nom :</label>
                        <input type="Nom" name="Nom">
                    </div>

                    <div>
                        <label for="Prénom"> Prénom :</label>
                        <input type="Prénom" name="Prénom">
                    </div>

                    <div>
                        <label for="Email"> Email :</label>
                        <input type="Email" name="Email">
                    </div>
                        <button type="submit">Suite</button>
                </form>
        ​
    <?php
    
} elseif($step === 1){
    ?>
​
            <h2>Etape 2 : Votre recherche</h2>
            ​
                <form action="?step=2" method="POST">
                    <p> Vous recherchez : </p>
                    <div>
                        <input type="checkbox" id="Homme" name="Genre[]">
                        <label for="Homme">Homme</label>
                    </div>

                    <div>
                        <input type="checkbox" id="Femme" name="Genre[]">
                        <label for="Femme">Femme</label>
                    </div>
                        
                    <p> Centre d'intérêt : </p>
                    <div>
                        <input type="checkbox" name="Cintérêt[]" value="Informatique">
                        <label for="Informatique">Informatique</label>
                    </div>

                    <div>
                        <input type="checkbox"  name="Cintérêt[]" value="Football">
                        <label for="Football">Football</label>
                    </div>

                    <div>
                        <input type="checkbox"  name="Cintérêt[]" value="Musique">
                        <label for="Musique">Musique</label>
                    </div>

                    <div>
                        <input type="checkbox" name="Cintérêt[]" value="Livre">
                        <label for="Livre">Livre</label>
                    </div>
                        <button type="submit">Suite</button>
                    </form>
                   
​
    <?php

} elseif($step === 2){
    ?>
​
            <h2>Etape 3 : Votre profil</h2>
​
                <form action="?step=3" method="POST">
                    <textarea name="text"></textarea>
                    <button type="submit">Envoyer</button>
                 </form>
    <?php

} else {
    ?>
    <h2>Félicitations !!</h2>
    <p> Vos informations ont été enregistré. </p>
    <button type="submit"> Suite </button>
​
<?php

} 



include 'Footer.html';