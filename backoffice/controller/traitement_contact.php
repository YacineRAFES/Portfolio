<?php
require '../modele/fonctions.php';

if ($_GET['action']){
    if($_GET['action']=='horaire'){
        $matin=$_POST['matin'];
        $apresmidi=$_POST['apres_midi'];
        $id_horaire=$_POST['id_contact_horaires'];
        modifierHoraire($bdd, $id_horaire, $matin, $apresmidi);
    }
    if($_GET['action']=='contact'){
        $email=$_POST['email'];
        $num=$_POST['num'];
        $adresse=$_POST['adresse'];
        $ville=$_POST['ville'];
        $dpt=$_POST['dpt'];
        modifCoordonneContact($bdd, $email, $num, $adresse, $ville, $dpt);
    }
    if($_GET['action']=='localisation'){
        $mapslink=$_POST['mapslink'];
        ModifMaps($bdd,$mapslink);
    }
    header('Location:../public/index.php?page=7');
}