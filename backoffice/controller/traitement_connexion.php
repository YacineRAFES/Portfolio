<?php 

require '../modele/fonctions.php';
session_start();
if(isset($_POST['user']) && isset($_POST['mdp'])){
    $user = htmlspecialchars($_POST['user']); //donnée à traiter plus tard
    $mdp = htmlspecialchars($_POST['mdp']);//donnée à traiter plus tard
    // Si l'email saisie est égale à 'admin@cci.fr' ET le mot de passe
    $userExists=userExists($bdd, $user);
    if($userExists){ // càd il existe un user avec l'email saisie dans le formulaire
        $passwordHash = $userExists['mdp'];
        if (password_verify($mdp, $passwordHash)){
            // identification réussie
            $_SESSION['idUser'] = $userExists['id_user'];// $_SESSION[']
            header('Location:../public/index.php?page=2');
        }else{
            header('Location:../public/index.php?erreur=identifiants');// mot de passe incorrect
        }
    }else{ // Aucun user ne correspond à l'email saisie
        header('Location:../public/index.php?erreur=identifiants');// adresse email incorrecte
    }
}