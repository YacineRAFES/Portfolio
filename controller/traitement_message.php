<?php
require "../modele/connexionpdo.php";
require "../modele/fonctions.php";
$email=htmlspecialchars($_POST['email']);
$objet=htmlspecialchars($_POST['objet']);
$message=htmlspecialchars($_POST['message']);

EnvoyerUnMessage($bdd, $email, $objet, $message);

$messageSuccess = "Votre message a été envoyé avec succès";
header('Location:../public/index.php?page=4&success='. $messageSuccess);
?>