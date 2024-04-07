<?php
require '../modele/fonctions.php';

$nom='RAFES';
$prenom='Yacine';
$email='yacine.rafes@gmail.com';
$mdp=password_hash('123', PASSWORD_DEFAULT);
userMaj($bdd, $nom, $prenom, $email, $mdp);