<?php 
require '../modele/fonctions.php';
session_start();
$dateactuel=time();
$longueurMax = 20;
if(isset($_SESSION['idUser'])){
    if ($_GET['action']){
        /*AJOUTER UNE IMAGE*/
        if ($_GET['action']=='ajouter'){
            $idvehicule=$_POST['idvehicule'];
            $VerifIDVehiculeExistant=VerifIDVehiculeExistant($bdd, $idvehicule);
            if($VerifIDVehiculeExistant){
                if(isset($_FILES['fichierimg']['name'])){
                    $extension_a_verifier = pathinfo($_FILES['fichierimg']['name'], PATHINFO_EXTENSION); 
                    $extension_valide = array('jpg', 'jpeg', 'png');
                    if(in_array(strtolower($extension_a_verifier), $extension_valide)){
                        $file_nameimg = $_FILES['fichierimg']['name'];
                        $file_tmp = $_FILES['fichierimg']['tmp_name'];
                        $file_nameimg=$dateactuel."_".$file_nameimg; // On modifie le nom de l'image avec la date
                        if(strlen($file_nameimg) > $longueurMax){
                            $new_filename=substr($file_nameimg, 0, $longueurMax);
                            if(move_uploaded_file($file_tmp,"../../public/assets/images/".$new_namefile)){ // On télécharge l'image dans le dossier du serveur
                                ajouterUneImage($bdd,$new_namefile,$idvehicule); // On ajoute le nom de l'image dans la BDD
                                $id_img=$bdd->lastInsertId(); // On récupère le nouveau ID image
                            }else{
                                $error = error_get_last();
                                echo "Une erreur est survenue: " . $error['message'];
                                exit();
                            }
                        }else{
                            $new_filename = $file_nameimg;
                            if(move_uploaded_file($file_tmp,"../../public/assets/images/".$new_filename)){ // On télécharge l'image dans le dossier du serveur
                                ajouterUneImage($bdd,$new_filename,$idvehicule); // On ajoute le nom de l'image dans la BDD
                                $id_img=$bdd->lastInsertId(); // On récupère le nouveau ID image
                            }else{
                                $error = error_get_last();
                                echo "Une erreur est survenue: " . $error['message'];
                                exit();
                            }
                        }
                    }else{
                        header('Location:../public/index.php?page=4'); // image invalide a cause de l'extension
                        exit();
                    }
                }
            }else{
                header('Location:../public/index.php?page=4&erreur=vehiculeexistant');
            }
        }
        /*CHANGER UNE IMAGE*/
        if ($_GET['action']=='changer'){
            if(isset($_FILES['fichierimg']['name'])){
                $extension_a_verifier = pathinfo($_FILES['fichierimg']['name'], PATHINFO_EXTENSION); 
                $extension_valide = array('jpg', 'jpeg', 'png');
                if(in_array(strtolower($extension_a_verifier), $extension_valide)){
                    $ImageExistant=ImageExistant($bdd, $id_img);
                    $file_nameimg = $_FILES['fichierimg']['name'];
                    $file_tmp = $_FILES['fichierimg']['tmp_name'];
                    $file_nameimg=$dateactuel."_".$file_nameimg; // On modifie le nom de l'image avec la date
                    if(move_uploaded_file($file_tmp,"../../public/assets/images/".$file_nameimg)){ // On télécharge l'image dans le dossier du serveur
                        if($ImageExistant['id_img']>1){ // Si l'image est supérieur à 1 donc
                            unlink("../../public/assets/images/".$ImageExistant['fichiers']); // On supprime l'image dans le dossier du serveur
                            NomDufichierAModifier($bdd,$file_nameimg,$ImageExistant['id_img']); // On modifie le fichier de l'image dans la BDD
                        }else{ // Si id image est égal à 1 donc
                            AjouterUneImage($bdd,$file_nameimg); // On ajoute le nom de l'image dans la BDD
                            $id_img=$bdd->lastInsertId(); // On récupère le nouveau ID image
                        }
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
            ModifierBlogs($bdd,$id_blog,$titre,$descCourt,$descLong,$categ,$id_img);
        }
        /*SUPPRIMER UNE IMAGE*/
        if ($_GET['action']=='suppr'){

        }
        /*METTRE L'IMAGE EN PRINCIPAL*/
        if ($_GET['action']=='main'){

        }
    }
}else{
    header('Location:../accueil');
}