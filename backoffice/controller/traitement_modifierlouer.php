<?php
require '../modele/connexionpdo.php';
require '../modele/fonctions.php';
$dateactuel=time();
$longueurMax = 20;
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
        ajouterVehicule($bdd,$vehicule,$id_categ);
        $id_vehicule=$bdd->lastInsertId();
        ajouterCaract($bdd,$marques,$motorisation,$nb_de_place,$prix,$textareacourt,$textarealong,$boite_de_vitesse,$longueur,$wc_douche,$lit,$lit_supp,$id_vehicule);
        if(isset($_FILES['fichier']['name'])){
            $extension_a_verifier = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION); 
            $extension_valide = array('jpg', 'jpeg', 'png');
            if(in_array(strtolower($extension_a_verifier), $extension_valide)){
                $file_nameimg = $_FILES['fichier']['name'];
                $file_tmp = $_FILES['fichier']['tmp_name'];
                $file_nameimg=$dateactuel."_".$file_nameimg; // On ajoute le timespan sur le nom du fichier
                if(strlen($file_nameimg) > $longueurMax){
                    $new_filename=substr($file_nameimg, 0, $longueurMax);
                    $new_filename=$new_filename.".".$extension_a_verifier;
                    if(move_uploaded_file($file_tmp,"../../public/assets/images/".$new_filename)){ // On télécharge l'image dans le dossier du serveur
                        ajouterUneImage($bdd,$new_filename,$id_vehicule,1); // On ajoute le nom de l'image dans la BDD
                        $id_img=$bdd->lastInsertId(); // On récupère le nouveau ID image
                    }else{
                        $error = error_get_last();
                        echo "Une erreur est survenue: " . $error['message'];
                        exit();
                    }
                }else{
                    $new_filename = $file_nameimg;
                    if(move_uploaded_file($file_tmp,"../../public/assets/images/".$new_filename)){ // On télécharge l'image dans le dossier du serveur
                        ajouterUneImage($bdd,$new_filename,$id_vehicule,1); // On ajoute le nom de l'image dans la BDD
                        $id_img=$bdd->lastInsertId(); // On récupère le nouveau ID image
                    }else{
                        $error = error_get_last();
                        echo "Une erreur est survenue: " . $error['message'];
                        exit();
                    }
                }
            }else{
                header('Location:blog-modification&idblog='.$id_blog."&erreur=img"); // image invalide a cause de l'extension
                exit();
            }
        }
        header('Location:../public/index.php?page=4');
    }

    //-------------------MODIFIER UN LOCATION-------------------

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
        $id_vehicule=$_POST['id_vehicule'];
        $vehicule=$_POST['vehicule'];
        $img=ImageExistantCaract($bdd, $id_vehicule);   
        if(isset($_FILES['fichier']['name'])){
            $extension_a_verifier = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
            $extension_valide = array('jpg', 'jpeg', 'png');
            if(in_array(strtolower($extension_a_verifier), $extension_valide)){
                $file_nameimg = $_FILES['fichier']['name'];
                $file_tmp = $_FILES['fichier']['tmp_name'];
                $file_nameimg=$dateactuel."_".$file_nameimg; // On modifie le nom de l'image avec la date
                if(strlen($file_nameimg) > $longueurMax){
                    $new_filename=substr($file_nameimg, 0, $longueurMax);
                    $new_filename=$new_filename.".".$extension_a_verifier;
                    if(move_uploaded_file($file_tmp,"../../public/assets/images/".$new_filename)){ // On télécharge l'image dans le dossier du serveur
                        if($img['id_img']>0){ // si l'image existe dans la bdd donc
                            unlink("../../public/assets/images/".$img['fichiers']);
                            ModifNomImage($bdd, $img['id_img'],$new_filename);
                        }else{
                            ajouterUneImage($bdd,$new_filename,$id_vehicule,1); // On ajoute le nom de l'image dans la BDD
                            $id_img=$bdd->lastInsertId();// On récupère le nouveau ID image
                        }
                    }else{
                        $error = error_get_last();
                        echo "Une erreur est survenue: " . $error['message'];
                        exit();
                    }
                }else{
                    $new_filename = $file_nameimg;
                    if(move_uploaded_file($file_tmp,"../../public/assets/images/".$new_filename)){ // On télécharge l'image dans le dossier du serveur
                        if($img['id_img']>0){ // si l'image existe dans la bdd donc
                            unlink("../../public/assets/images/".$img['fichiers']);
                            ModifNomImage($bdd, $img['id_img'],$new_filename);
                        }else{
                            ajouterUneImage($bdd,$new_filename,$id_vehicule,1); // On ajoute le nom de l'image dans la BDD
                            $id_img=$bdd->lastInsertId();// On récupère le nouveau ID image
                        }
                    }else{
                        $error = error_get_last();
                        echo "Une erreur est survenue: " . $error['message'];
                        exit();
                    }
                }
            }else{
                header('Location:blog-modification&idblog='.$id_blog."&erreur=img"); // image invalide a cause de l'extension
                exit();
            }
        }
        ModifCaracteristiques($bdd,$vehicule,$marques,$motorisation,$nb_de_place,$prix,$textareacourt,$textarealong,$boite_de_vitesse,$longueur,$wc_douche,$lit,$lit_supp,$id_caract,$id_vehicule,$img['id_img'],$new_filename);
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