<?php
 

include 'header.html';

?>

<h1 style="text-align:center;">Contact</h1>
<p style="text-align:center;">Une remarque ? Une suggestion ? N'hésitez pas à m'écrire !!</p>

<form action="indexContact.php" method="POST">

    <div style="text-align:center;" class="form-group">
        <label for="Nom"> Nom :</label>
        <input type="Nom" name="Nom">
    </div>

    <div style="text-align:center;" class="form-group">    
        <label for="email">Adresse email :</label>
        <input type="email" name="email">
    </div>

    <div style="text-align:center;" class="form-group">    
        <label for="Objet">Objet :</label>
        <input type="Objet" name="Objet">
    </div>


    <div style="text-align:center;">
        <label for="msg">Message :</label>
        <textarea name="msg"></textarea>
    </div>   

    <div align="center">
        <input type="submit" value="Envoyer" style="align-items:center;">
    </div>

</form>

<?php


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (!empty($_POST['Nom'])&&!empty($_POST['email'])&&!empty($_POST['Objet'])&&!empty($_POST['msg'])) {
    $name=$_POST['Nom'];
    $mail=$_POST['email'];
    $objet=$_POST['Objet'];
    $msg=$_POST['msg'];
    echo $name,$mail,$objet,$msg;

$mail = new PHPMailer();
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'ssl0.ovh.net';                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'it@ws312.com';                     // SMTP username
$mail->Password   = 'Azertyviop0';                               // SMTP password
$mail->SMTPSecure = PHPMailer ::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
$mail->Port       = 465;                                    // TCP port to connect to

//Recipients
$mail->setFrom('it@ws312.com','le msg');
$mail->addAddress('s.zai@it-students.fr', 'Serge user');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($mail, $name);
//$mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true); // Set email format to HTML
$mail = "utf-8";             
$mail->Subject = $objet;
$mail->Body    = $msg;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if (!$mail->send()) {
    echo 'Erreur, message non envoyé.';
    echo 'Mailer Error :' . $mail->ErrorInfo;
} else {
    echo 'le messsage a bien été envoyé !';
}}

    // if (isset($_POST['msg'])) {
    //     $position_arobase = strpos($_POST['Adresse email'], '@');
    //     if ($position_arobase === false)
    //         echo '<p>Votre email doit comporter un arobase</p>';
    //     else {
    //         $retour = mail('sza@gmail.com', 'Envoi depuis la page Contact', $_POST['msg'],'From: ' . $_POST['Adresse mail']);
    //         if($retour)
    //             echo '<p>Votre message a été envoyé.</p>';
    //         else 
    //             echo '<p>Erreur.</p>';

    //     }
    // }
?>

<?php

include 'Footer.html';

?>