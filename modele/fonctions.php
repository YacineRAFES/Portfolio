<?php
    require 'connexionpdo.php';

    /***********************************************************/
    /*****         REQUETE D'AFFICAGES DES GUIDES          *****/
    /***********************************************************/

    function afficherGuides($bdd) {
        $reqAfficherGuides=$bdd->prepare("SELECT * FROM guide WHERE publier=1");
        $reqAfficherGuides->execute();
        $afficherGuides=$reqAfficherGuides->fetchAll();

        return $afficherGuides;
    }

    /***********************************************************/
    /*****        REQUETE D'AFFICAGES DES VEHICULES        *****/
    /***********************************************************/

    function afficherToutModele($bdd) {
        $reqAfficherToutModele=$bdd->prepare("SELECT desc_short, desc_long, fichiers as img, vehicule, marques, motorisation, nb_de_place, prix, boite, longueur, wc_douche, lit, lit_supp FROM caracteristiques_vehicules, vehicules, images WHERE vehicules.id_vehicule=images.id_vehicule AND caracteristiques_vehicules.id_vehicule=vehicules.id_vehicule AND caracteristiques_vehicules.publier=1 AND caracteristiques_vehicules.delected=0");
        $reqAfficherToutModele->execute();
        $affToutModele=$reqAfficherToutModele->fetchAll();
        
        return $affToutModele;
    }
    function EnvoyerUnMessage($bdd, $email, $objet, $message){
        $reqEnvoyerUnMessage=$bdd->prepare('INSERT INTO message(email,objet,message) VALUES(:email,:objet,:message)');
        $reqEnvoyerUnMessage->execute([':email'=>$email,':objet'=>$objet,':message'=>$message]);
    }
    /*************************
     * AFFICHAGE IMAGE SLIDE *
     *************************/
    function AfficherImageSlide($bdd){
        $reqAfficherImageSlide=$bdd->prepare('SELECT * FROM accueil_carouselslide');
        $reqAfficherImageSlide->execute();
        $AfficherImageSlide=$reqAfficherImageSlide->fetchAll();

        return $AfficherImageSlide;
    }
    /******************************
     * AFFICHAGE DE ASSURGARANTIE *
     ******************************/
    function AfficherAssurGarantie($bdd){
        $reqAfficherAssurGarantie=$bdd->prepare('SELECT * FROM accueil_assurgarantie WHERE delected=0 AND publier=1');
        $reqAfficherAssurGarantie->execute();
        $AfficherAssurGarantie=$reqAfficherAssurGarantie->fetchAll();

        return $AfficherAssurGarantie;
    }
    /********************************
     * AFFICHAGE OPTION ACCESSOIRES *
     ********************************/
    function AffichageOption($bdd){
        $reqAffichageOption=$bdd->prepare('SELECT * FROM option_accessoires WHERE delected=0 AND publier=1');
        $reqAffichageOption->execute();
        $AffichageOption=$reqAffichageOption->fetchAll();

        return $AffichageOption;
    }
    /*********************
     * AFFICHAGE CONTACT *
     *********************/
    function coordonneContact($bdd){
        $reqcoordonneContact=$bdd->prepare('SELECT * FROM contact_num_email');
        $reqcoordonneContact->execute();
        $coordonne=$reqcoordonneContact->fetchAll();

        return $coordonne;
    }
    function Horaire($bdd){
        $reqHoraire=$bdd->prepare('SELECT * FROM contact_horaire');
        $reqHoraire->execute();
        $Horaire=$reqHoraire->fetchAll();

        return $Horaire;
    }



    function AffichageService($bdd){
        $reqAffichageService=$bdd->prepare('SELECT * FROM services WHERE delected=0 AND publier=1');
        $reqAffichageService->execute();
        $AffichageService=$reqAffichageService->fetchAll();

        return $AffichageService;
    }
    function AffichageServicesMultirisques($bdd){
        $reqAffichageServicesMultirisques=$bdd->prepare('SELECT * FROM services_multirisques WHERE delected=0 AND publier=1');
        $reqAffichageServicesMultirisques->execute();
        $AffichageServicesMultirisques=$reqAffichageServicesMultirisques->fetchAll();

        return $AffichageServicesMultirisques;
    }
    function AffichageMaps($bdd){
        $reqAffichageMaps=$bdd->prepare('SELECT * FROM maps');
        $reqAffichageMaps->execute();
        $AffichageMaps=$reqAffichageMaps->fetch();

        return $AffichageMaps;
    }
?>