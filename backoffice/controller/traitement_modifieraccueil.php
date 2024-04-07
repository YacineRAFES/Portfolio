<?php
require '../modele/fonctions.php';
if($_GET['action']){
    if($_GET['action']==='carouselslide'){
        $id_carouselslide=$_POST['idcarouselslide'];
        $ImageExistantCarousel=ImageExistantCarousel($bdd,$id_carouselslide);
        if($ImageExistantCarousel){
            $NomImageCarousel=NomImageCarousel($bdd,$id_carouselslide);
            unlink("../../assets/images/".$NomImageCarousel);
        }
        if(isset($_FILES['fichier'])){
            $file_name = $_FILES['fichier']['name'];
            $file_size = $_FILES['fichier']['size'];
            $file_tmp = $_FILES['fichier']['tmp_name'];
            $file_type = $_FILES['fichier']['type'];
            move_uploaded_file($file_tmp,"../../assets/images/".$file_name);
        }
        // function AjouterUneImageSlide($bdd){}
        AjouterUneImageSlide($bdd,$file_name,$id_carouselslide);
    }
    if($_GET['action']==='assurgarantie'){
        $titre=$_POST['titre'];
        $desc=$_POST['desc'];
        $id_assurgarantie=$_POST['id_assurgarantie'];
        //function ModifAssurGarantie($bdd){}
        ModifAssurGarantie($bdd,$titre,$desc,$id_assurgarantie);
    }
    if($_GET['action']==='suppr'){
        $id_a_suppr=$_GET['idassurgarantie'];
        //function AssurGarantieASuppr($bdd){}
        AssurGarantieASuppr($bdd,$id_a_suppr);

    }
    if($_GET['action']==='ajouterassurgarantie'){
        $titre=$_POST['titre'];
        $desc=$_POST['desc'];
        AjouterAssurGarantie($bdd,$titre,$desc);
    }
    if($_GET['action'] == 'visible'){
        if($_GET['visibilite'] == 1){
            $idassurgarantie=htmlspecialchars($_GET['idassurgarantie']);
            visibleAssurGarantie($bdd, $idassurgarantie, 0);
            header('Location:../public/index.php?page=3');
        }
        if($_GET['visibilite'] == 0){
            $idassurgarantie=htmlspecialchars($_GET['idassurgarantie']);
            visibleAssurGarantie($bdd, $idassurgarantie, 1);
            header('Location:../public/index.php?page=3');
        }
    }
}

header('Location:../public/index.php?page=3');
?>