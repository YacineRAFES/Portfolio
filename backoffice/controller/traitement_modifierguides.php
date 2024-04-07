<?php
require '../modele/fonctions.php';


if ($_GET['action']){
    if ($_GET['action']=='ajouter'){
        $datecreation=date('Y-m-d H:i:s');
        $titre = $_POST['titre'];
        $textarea = $_POST['textarea'];

        if(isset($_FILES['fichier'])){
            $file_name = $_FILES['fichier']['name'];
            $file_size = $_FILES['fichier']['size'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
            $file_type = $_FILES['fichier']['type'];
            move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
        }
        AjouterGuide($bdd,$titre,$file_name,$textarea,$datecreation);
        header('Location:../public/index.php?page=5');
    }
    if ($_GET['action']=='modifier'){
        $datemaj=date('Y-m-d H:i:s');
        $idguide=$_POST['idguide'];
        $titre=$_POST['titre'];
        $textarea=$_POST['textarea'];
        if($_FILES['fichier']['name'] == ""){
            $NomImageGuides=NomImageGuides($bdd,$idguide);
            $file_name=$NomImageGuides;
        }else{
            $ImageExistantGuides=ImageExistantGuides($bdd,$idguide);
            if($ImageExistantGuides){
                $NomImageGuides=NomImageGuides($bdd,$idguide);
                unlink("../../assets/images/".$NomImageGuides);
            }
            $file_name = $_FILES['fichier']['name'];
            $file_size = $_FILES['fichier']['size'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
            $file_type = $_FILES['fichier']['type'];
            move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
        }
        ModifierGuide($bdd,$titre,$file_name,$textarea,$datemaj,$idguide);
        header('Location:../public/index.php?page=5');
    }
    if ($_GET['action']=='supprimer'){
        SupprimerGuide($bdd,$_GET['idguide']);
        header('Location:../public/index.php?page=5');
    }
    if($_GET['action']=='visible'){
        if($_GET['visibilite'] == 1){
            $idguide=htmlspecialchars($_GET['idguide']);
            visibleGuide($bdd, $idguide, 0);
            header('Location:../public/index.php?page=5&s=1');
        }
        if($_GET['visibilite'] == 0){
            $idguide=htmlspecialchars($_GET['idguide']);
            visibleGuide($bdd, $idguide, 1);
            header('Location:../public/index.php?page=5&s=1');
        }
    }
    if($_GET['action']=='rajouterdesimages'){

        if(isset($_FILES['fichier'])){
            $file_name = $_FILES['fichier']['name'];
            $file_size = $_FILES['fichier']['size'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
            $file_type = $_FILES['fichier']['type'];
            move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
        }
        
    }
}