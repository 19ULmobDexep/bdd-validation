
<?php
 $result = 0 ;

// function exposant($val1, $val2){
//    $resultat = 1;
//   for ($i = 0; $i<$val2; $i++){
//       $resultat = $resultat * $val1 ;
//   }
//    return $resultat ;
// } 


// if (!empty($_POST)) {


//     $result = 0 ;


//  switch ($_POST['sign']) {
//      case 'plus':
//          $result = (intval($_POST['val1']) + intval($_POST['val2']));
//          break;
    
//     case 'moins':
//          $result = (intval($_POST['val1']) - intval($_POST['val2']));
//          break;

//     case 'fois':
//          $result = (intval($_POST['val1']) * intval($_POST['val2']));
//          break;

//     case 'divise':
//          $result = (intval($_POST['val1']) / intval($_POST['val2']));
//          break;

//     case 'exposant':

//          $result = exposant( intval($_POST['val1']), intval($_POST['val2']));
//          break;
     
//      default:
//         echo '?? wtf ?';
//          break;
//     }
//     echo $_POST['val1'].' '.$_POST['sign'].' '.$_POST['val2']. ' = '. $result;


// }
 $val1 = '';
 $val2 = '';
 $sign = '';

//  if(!empty($_POST['val1'])) {
//      $val1 = $_POST['val1'] ;
//  }

//  if(!empty($_POST['val2'])) {
//     $val2 = $_POST['val2'] ;
// }

// if(!empty($_POST['sign'])) {
//     $sign = $_POST['sign'] ;
// }

$options = ['plus', 'moins','fois', 'divise','exposant'];

if (!empty($_POST)) {


include 'traitement.php';
}

include 'header.html';


?>

<h1>Calculatrice</h1>


<form action="index.php" method="POST">

    <label for="val1">Val 1 </label>
    <input type="text" name="val1" id="val1" value="<?php echo $val1; ?>" />
    <label for="sign">Sign </label>
    <select name="sign" id="sign" >
        <?php
        for($i=0; $i<count($options); $i++){ 
            echo '<option';
            if($sign === $options[$i]) {
                echo 'selected';
            }
            echo ">".$options[$i]."</option>";
        }
        ?>

        <!-- <option <?php if ($sign === 'plus') {echo 'selected';} ?>>plus</option> -->
        <!-- <option <?php if ($sign === 'moins') {echo 'selected';} ?>>moins</option> -->
        <!-- <option <?php if ($sign === 'fois') {echo 'selected';} ?>>fois</option> -->
        <!-- <option <?php if ($sign === 'divise') {echo 'selected';} ?>>divise</option> -->
        <!-- <option <?php if ($sign === 'exposant') {echo 'selected';} ?>>exposant</option> -->
    </select>
    <label for="val2">Val 2 </label>
    <input type="text" name="val2" id="val2" value="<?php echo $val2; ?>" />
    <input type="text" value="<?php echo $result; ?>" />
    <input type="submit" value="calcule" />
    <input type="text" disabled value="<?php echo $result; ?>" />

</form>

<h3>Calculatrice 300-GX</h3>
<?php

include 'Footer.html';


