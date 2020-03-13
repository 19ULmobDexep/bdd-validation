<?php




require_once("libA/posta.php");


$text = " Il était une fois";

$obj = Post::getFromText($text);



$myPost = Post::create([
    'title' => 'red',
    'text' => 'DF 206 KJ'
]) ;


var_dump($myPost);



$allPost =  Post::findAll([
    'title'=>'blue'
]);echo '<pre>';
var_dump($$allPost);
echo '</pre>';







/*
require_once("libA/posta.php");

$maVoiture = new Voiture(1);
//$maVoiture->printCOlor();
echo $maVoiture->getText();
echo '<br>------------------------</br>';




$maVoiture->changeText('Il ne se lève pas, pourquoi donc ?');


//echo $maVoiture->getColor();

echo '<br>------------------------</br>';


unset($maVoiture);

$taVoiture = new Voiture(2);
//$taVoiture->printColor();
echo $taVoiture->getText();
echo '<br>------------------------</br>';


$taVoiture->changeText('Oye Oye Oye');

*/ 