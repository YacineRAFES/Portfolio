<?php 
require '../modele/fonctions.php';

if ($_GET['action']){
    if ($_GET['action']=='modifier'){
        $titre=$_POST['titre'];
        $idoption=$_POST['id_option'];
        if($_FILES['fichier']['name'] == ""){
            $ImageExiste=ImageExistant($bdd,$idoption);
            if($ImageExiste){
                $nomimage=NomImage($bdd,$idoption);
                unlink("../../assets/images/".$nomimage);
            }
            if(isset($_FILES['fichier'])){
                $file_name = $_FILES['fichier']['name'];
                $file_size = $_FILES['fichier']['size'];
                $file_tmp = $_FILES['fichier']['tmp_name'];
                $file_type = $_FILES['fichier']['type'];
                move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
            }
        }
        ModifierOption($bdd,$titre,$file_name,$idoption);
        header('Location:../public/index.php?page=6');
    }
    if ($_GET['action']=='supprimer'){
        $id_option=$_GET['idoption'];
        SupprimerOption($bdd,$id_option);
        header('Location:../public/index.php?page=6');
    }
    if ($_GET['action']=='ajouter'){
        $titre=$_POST['titre'];
        if(isset($_FILES['fichier'])){
            $file_name = $_FILES['fichier']['name'];
            $file_size = $_FILES['fichier']['size'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
            $file_type = $_FILES['fichier']['type'];
            move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
        }
        AjouterOption($bdd,$titre,$file_name);
        header('Location:../public/index.php?page=6');
    }
    if($_GET['action'] == 'visible'){
        if($_GET['visibilite'] == 1){
            $idoption=htmlspecialchars($_GET['idoption']);
            visibleOption($bdd, $idoption, 0);
            header('Location:../public/index.php?page=6&s=2#'.$_GET['idoption']);
        }
        if($_GET['visibilite'] == 0){
            $idoption=htmlspecialchars($_GET['idoption']);
            visibleOption($bdd, $idoption, 1);
            header('Location:../public/index.php?page=6&s=2#'.$_GET['idoption']);
        }
    }
}

?>