<?php
require '../modele/fonctions.php';

if($_GET['action']){
    if($_GET['action']=='modifservices'){// services bloc
        $idbloctext=$_POST['id_bloctext'];
        $titre=$_POST['titre'];
        $bloctext=$_POST['bloctext'];
        ModifServiceBlocText($bdd,$titre,$bloctext,$idbloctext);
        header('Location:../public/index.php?page=8&s=1#a'.$idbloctext);
    }
    
    if($_GET['action']=='ajouterBlocServices'){
        $titrebloctext=$_POST['titre'];
        $bloctextservices=$_POST['bloctext'];
        ajouterBlocServices($bdd,$titrebloctext,$bloctextservices);
        $id=$bdd->lastinsertid();
        header('Location:../public/index.php?page=8&s=1#a'.$id);
    }
    if($_GET['action']=='supprservices'){
        $id_services=$_GET['idservices'];
        SupprServices($bdd,$id_services);
        header('Location:../public/index.php?page=8&s=1');
    }
    if($_GET['action']=='modifblocgarantie'){// services multirisque
        $id_services_multirisques=$_POST['id_services_multirisques'];
        $bloc=$_POST['bloc'];
        ModifServiceMultirisques($bdd, $bloc, $id_services_multirisques);
        header('Location:../public/index.php?page=8&s=1#b'.$id_services_multirisques);
    }
    if($_GET['action']=='ajouterBlocServicesMultirisques'){
        $bloctext=$_POST['titre'];
        ajouterBlocServicesMultirisques($bdd,$bloctext);
        $id=$bdd->lastinsertid();
        header('Location:../public/index.php?page=8&s=1#b'.$id);
    }
    if($_GET['action']=='supprimerblocgaranties'){
        $id_bloc=$_GET['id_bloc'];
        supprBlocGarantie($bdd, $id_bloc);
        header('Location:../public/index.php?page=8&s=1');
    }
    if($_GET['action'] == 'visible1'){
        if($_GET['visibilite'] == 1){
            $idservices=htmlspecialchars($_GET['idservices']);
            visibleService($bdd, $idservices, 0);
            header('Location:../public/index.php?page=8&s=1#a'.$idservices);
        }
        if($_GET['visibilite'] == 0){
            $idservices=htmlspecialchars($_GET['idservices']);
            visibleService($bdd, $idservices, 1);
            header('Location:../public/index.php?page=8&s=1#a'.$idservices);
        }
    }
    if($_GET['action'] == 'visible2'){
        if($_GET['visibilite'] == 1){
            $id_bloc=htmlspecialchars($_GET['id_bloc']);
            visibleServiceMulti($bdd, $id_bloc, 0);
            header('Location:../public/index.php?page=8&s=1#b'.$id_bloc);
        }
        if($_GET['visibilite'] == 0){
            $id_bloc=htmlspecialchars($_GET['id_bloc']);
            visibleServiceMulti($bdd, $id_bloc, 1);
            header('Location:../public/index.php?page=8&s=1#b'.$id_bloc);
        }
    }

}