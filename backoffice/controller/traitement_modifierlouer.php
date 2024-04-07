<?php
require '../modele/connexionpdo.php';
require '../modele/fonctions.php';
if($_GET['action']){
    if($_GET['action']=='ajouter'){
        $marques=$_POST['marques'];
        $motorisation=$_POST['motorisation'];
        $nb_de_place=$_POST['nb_de_place'];
        $prix=$_POST['prix'];
        $textareacourt=$_POST['textareacourt'];
        $textarealong=$_POST['textarealong'];
        $boite_de_vitesse=$_POST['boite_de_vitesse'];
        $longueur=$_POST['longueur'];
        $wc_douche=$_POST['wc_douche'];
        $lit=$_POST['lit'];
        $lit_supp=$_POST['lit_supp'];
        $vehicule=$_POST['vehicule'];
        $id_categ=$_POST['categ'];
        if(isset($_FILES['fichierimg']['name'])){
            $extension_a_verifier = pathinfo($_FILES['fichierimg']['name'], PATHINFO_EXTENSION); 
            $extension_valide = array('jpg', 'jpeg', 'png');
            if(in_array(strtolower($extension_a_verifier), $extension_valide)){
                $file_nameimg = $_FILES['fichierimg']['name'];
                $file_tmp = $_FILES['fichierimg']['tmp_name'];
                $file_nameimg=$dateactuel."_".$file_nameimg; // On modifie le nom de l'image avec la date
                if(move_uploaded_file($file_tmp,"../../public/assets/images/".$file_nameimg)){ // On télécharge l'image dans le dossier du serveur
                    ajouterUneImage($bdd,$file_name,$idvehicule); // On ajoute le nom de l'image dans la BDD
                    $id_img=$bdd->lastInsertId(); // On récupère le nouveau ID image
                }else{
                    $error = error_get_last();
                    echo "Une erreur est survenue: " . $error['message'];
                    exit();
                }
            }else{
                header('Location:blog-modification&idblog='.$id_blog."&erreur=img"); // image invalide a cause de l'extension
                exit();
            }
        }
        if(isset($_FILES['fichier'])){
            $file_name = $_FILES['fichier']['name'];
            $file_size = $_FILES['fichier']['size'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
            $file_type = $_FILES['fichier']['type'];
            move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
        }
        if($file_name){
            ajouterUneImage($bdd,$file_name,$id_vehicule);
        }
        $id_img=$bdd->lastInsertId();
        ajouterVehicule($bdd,$vehicule,$id_categ,$id_img);
        $id_vehicule=$bdd->lastInsertId();
        ajouterCaract($bdd,$marques,$motorisation,$nb_de_place,$prix,$textareacourt,$textarealong,$boite_de_vitesse,$longueur,$wc_douche,$lit,$lit_supp,$id_vehicule);
        header('Location:../public/index.php?page=4');
    }
    if($_GET['action']=='modifier'){
        $id_caract=$_POST['id_caract'];
        $marques=$_POST['marques'];
        $motorisation=$_POST['motorisation'];
        $nb_de_place=$_POST['nb_de_place'];
        $prix=$_POST['prix'];
        $textareacourt=$_POST['textareacourt'];
        $textarealong=$_POST['textarealong'];
        $boite_de_vitesse=$_POST['boite_de_vitesse'];
        $longueur=$_POST['longueur'];
        $wc_douche=$_POST['wc_douche'];
        $lit=$_POST['lit'];
        $lit_supp=$_POST['lit_supp'];
        $id_img=$_POST['id_img'];
        $id_vehicule=$_POST['id_vehicule'];
        $vehicule=$_POST['vehicule'];
        
        if($_FILES['fichier']['name'] == ""){
            $NomImageCaract=NomImageCaract($bdd,$id_img);
            $file_name=$NomImageCaract;
        }else{
            $ImageExistantCaract=ImageExistantCaract($bdd, $id_img, $id_caract, $id_vehicule);
            if($ImageExistantCaract){
                $NomImageCaract=NomImageCaract($bdd,$id_img);
                unlink("../../assets/images/".$NomImageCaract);
            }
            if(isset($_FILES['fichier'])){
                $file_name = $_FILES['fichier']['name'];
                $file_size = $_FILES['fichier']['size'];
                $file_tmp = $_FILES['fichier']['tmp_name'];
                $file_type = $_FILES['fichier']['type'];
                move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
            }
        }
        ModifCaracteristiques($bdd,$vehicule,$file_name,$marques,$motorisation,$nb_de_place,$prix,$textareacourt,$textarealong,$boite_de_vitesse,$longueur,$wc_douche,$lit,$lit_supp,$id_caract,$id_img,$id_vehicule);
        header('Location:../public/index.php?page=4');
    }
    if($_GET['action']=='supprimer'){
        $id_caract=$_GET['idcaract'];
        SupprimerLouer($bdd,$id_caract);
        header('Location:../public/index.php?page=4');
    }
    if($_GET['action'] == 'visible'){
        if($_GET['visibilite'] == 1){
            $idcaract=htmlspecialchars($_GET['idcaract']);
            visibleCaract($bdd, $idcaract, 0);
            header('Location:../public/index.php?page=4&s=1#'.$_GET['idcaract']);
        }
        if($_GET['visibilite'] == 0){
            $idcaract=htmlspecialchars($_GET['idcaract']);
            visibleCaract($bdd, $idcaract, 1);
            header('Location:../public/index.php?page=4&s=1#'.$_GET['idcaract']);
        }
    }
    if($_GET['action']== 'rajouterdesimages'){
        if($_GET['ajout']){
            $idcaract=htmlspecialchars($_POST['idcaract']);
            
        }
        if($_GET['sppr']){
            $idcaract=htmlspecialchars($_POST['idcaract']);

        }
    }
    if($_GET['action'] == 'vue'){
        if($_GET['visibilite'] == 1){
            $idimgsupp=htmlspecialchars($_GET['idimgsupp']);
            VisibleImgSupp($bdd, $idimgsupp, 0);
            header('Location:../public/index.php?page=4&s=1#'.$_GET['idimgsupp']);
        }
        if($_GET['visibilite'] == 0){
            $idimgsupp=htmlspecialchars($_GET['idimgsupp']);
            VisibleImgSupp($bdd, $idimgsupp, 1);
            header('Location:../public/index.php?page=4&s=1#'.$_GET['idimgsupp']);
        }
    }
}
?>