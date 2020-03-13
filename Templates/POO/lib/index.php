<?php

// Définir objet Voiture //
require_once("lib/voiture.php");

require_once("lib/parcAuto.php");



// Formule Magique //
$car = new Voiture(3);

var_dump($car->getColor('red'));

var_dump($car->setColor('green'));

var_dump($car->getColor());


/*

var_dump($car->getColor());
var_dump($car->getCouleur());
var_dump($car->getParc());
var_dump($cars->getImmat());


die;



$cars = Voiture::findAll(['color'=>'blue', 'idParkAuto'=>2]);

echo'<pre>';
var_dump($cars);
echo'<pre>';



$parc = ParcAuto::findOne(['city'=>'Lyon']);

$allBlueCars = $parc->getAllCars(['color'=>'blue']);

echo'<pre>';
var_dump($parc);
echo'<pre>';




die;




$cars = Voiture::findAll() ;
echo'<pre>';
var_dump($cars);
echo'<pre>';




die;


$posts = Post::findAll(['DATE(date)'=>'2020-02-04']);
echo'<pre>';
var_dump($posts);
echo'<pre>';





$plate = "YY 206 KJ";

$obj = Voiture::getFromImmat($plate);



$myCar = Voiture::create([
    'color' => 'red',
    'immat' => 'DF 206 KJ',
    'nbDoors' => 5
]) ;


var_dump($myCar);



$allCars =  Voiture::findAll([
    'color'=>'blue'
]);echo '<pre>';
var_dump($allCars);
echo '</pre>';




// Définir objet ParcAuto //
require_once("lib/parcAuto.php");


$maVoiture = new Voiture(1);
//$maVoiture->printCOlor();//
echo $maVoiture->getImmat();
echo '<br>------------------------</br>';







$maVoiture->changeImmat('RS 643 HJ');

//echo $maVoiture->getColor();

echo '<br>------------------------</br>';


unset($maVoiture);

$taVoiture = new Voiture(2);
//$taVoiture->printColor();
echo $taVoiture->getImmat();
echo '<br>------------------------</br>';


$taVoiture->changeImmat('YY 206 KJ');







// liste des parcs automobiles 


// Je récupère celui qui a le plus de voitures 


// Je l'intérroge pour avoir le no,bre de véhicules bleus 

// Je liste les plaques d'immatriculation des véhicules qui ne sont en panne 

*/