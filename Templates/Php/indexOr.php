<?php


session_start();



if(empty($_SESSION['messages'])) { 
    $_SESSION['messages'] = [] ;
}


if (!empty($_POST['text'])) {
    $m = [
        "message" => $_POST['text'],
        "date"    => strftime('%Y-%m-%d %H:%M')
    ];
  
    array_push($_SESSION['messages'], $m) ;
}

//var_dump($_POST);

include 'header.html';


?>

 <h1>Livre D'or</h1>


 <?php


if(!empty($_SESSION['messages']) && count($_SESSION['messages'])) :?>
    <ul id="message">
            <?php foreach ($_SESSION['messages'] as $key => $text) :?>
                <li class="card">
                <div class="card-body"><?php echo $text['message']; ?></div>
                <div class="card-footer"><?php echo $text['date']; ?></div>
            </li>
        <?php endforeach ; ?>
    </ul>
<?php
endif
?>


<form action="indexOr.php" method="POST" class="row">

     <textarea name="text"></textarea>
     <input type="submit" value="envoyer">

</form>

<?php

include 'Footer.html';