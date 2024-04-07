<?php
    require '../modele/connexionpdo.php';
    function userExists($bdd, $user){
        $reqUserExists=$bdd->prepare('SELECT * FROM user WHERE email = :mail');
        $reqUserExists->execute([':mail'=>$user]);
        $userExists=$reqUserExists->fetch();

        return $userExists;
    }
    function userMaj($bdd, $nom, $prenom, $email, $mdp){
        $requserMaj=$bdd->prepare('INSERT INTO user SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp');
        $requserMaj->execute([':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':mdp'=>$mdp]);
    }
    
    function GuideAffichage($bdd){
        $reqGuideAffichage=$bdd->prepare('SELECT * FROM guide WHERE delected=0');
        $reqGuideAffichage->execute();
        $GuideAffichage=$reqGuideAffichage->fetchAll();

        return $GuideAffichage;
    }
    function LouerAffichage($bdd){
        $reqLouerAffichage=$bdd->prepare('SELECT * FROM caracteristiques_vehicules, vehicules, images WHERE caracteristiques_vehicules.id_vehicule=vehicules.id_vehicule AND vehicules.id_vehicule=images.id_vehicule AND caracteristiques_vehicules.delected=0');
        $reqLouerAffichage->execute();
        $LouerAffichage=$reqLouerAffichage->fetchAll();

        return $LouerAffichage;
    }
    function LouerAffichageAvecIDCaract($bdd,$id_caract){
        $reqLouerAffichageAvecIDCaract=$bdd->prepare('SELECT * FROM caracteristiques_vehicules, vehicules, images WHERE caracteristiques_vehicules.id_vehicule=vehicules.id_vehicule AND vehicules.id_vehicule=images.id_vehicule AND caracteristiques_vehicules.id_caract=:idcaract');
        $reqLouerAffichageAvecIDCaract->execute([':idcaract'=>$id_caract]);
        $LouerAffichageAvecIDCaract=$reqLouerAffichageAvecIDCaract->fetch();

        return $LouerAffichageAvecIDCaract;
    }

    function AfficherImageSlide($bdd){
        $reqAfficherImageSlide=$bdd->prepare('SELECT * FROM accueil_carouselslide');
        $reqAfficherImageSlide->execute();
        $AfficherImageSlide=$reqAfficherImageSlide->fetchAll();

        return $AfficherImageSlide;
    }
    function AfficherAssurGarantie($bdd){
        $reqAfficherAssurGarantie=$bdd->prepare('SELECT * FROM accueil_assurgarantie WHERE delected=0');
        $reqAfficherAssurGarantie->execute();
        $AfficherAssurGarantie=$reqAfficherAssurGarantie->fetchAll();

        return $AfficherAssurGarantie;
    }

    function AjouterAssurGarantie($bdd,$titre,$desc){
        $reqAjouterAssurGarantie=$bdd->prepare('INSERT INTO accueil_assurgarantie(titre,description) VALUES(:titre,:desc)');
        $reqAjouterAssurGarantie->execute([':titre'=>$titre,':desc'=>$desc]);
        
    }

    function AffichageOption($bdd){
        $reqAffichageOption=$bdd->prepare('SELECT * FROM option_accessoires WHERE delected=0');
        $reqAffichageOption->execute();
        $AffichageOption=$reqAffichageOption->fetchAll();

        return $AffichageOption;
    }
    function AffichageOptionAvecID($bdd,$idoption){
        $reqAffichageOptionAvecID=$bdd->prepare('SELECT * FROM option_accessoires WHERE id_option=:idoption');
        $reqAffichageOptionAvecID->execute([':idoption'=>$idoption]);
        $AffichageOptionAvecID=$reqAffichageOptionAvecID->fetch();

        return $AffichageOptionAvecID;
    }

    function SupprimerOption($bdd,$idoption){
        $reqSupprimerOption=$bdd->prepare('UPDATE option_accessoires SET delected=1 WHERE id_option=:id_option');
        $reqSupprimerOption->execute([':id_option'=>$idoption]);
    }

    function ModifierOption($bdd,$titre,$img,$idoption){
        $reqModifierOption=$bdd->prepare('UPDATE option_accessoires SET titre_option=:titre_option, img=:img WHERE id_option=:id_option');
        $reqModifierOption->execute([':titre_option'=>$titre,':img'=>$img,':id_option'=>$idoption]);
    }

    function AjouterOption($bdd,$titre,$img){
        $reqAjouterOption=$bdd->prepare('INSERT INTO option_accessoires SET titre_option=:titre_option, img=:img');
        $reqAjouterOption->execute([':titre_option'=>$titre,':img'=>$img]);
    }

    function ImageExistant($bdd,$idoption){
        $reqImageExistant=$bdd->prepare('SELECT COUNT(img) FROM option_accessoires WHERE id_option=:idoption');
        $reqImageExistant->execute([':idoption'=>$idoption]);
        $ImageExiste=$reqImageExistant->fetch();

        return $ImageExiste;
    }
    
    function NomImage($bdd,$idoption){
        $reqNomImage=$bdd->prepare('SELECT img FROM option_accessoires WHERE id_option=:id_option');
        $reqNomImage->execute([':id_option'=>$idoption]);
        $NomImage=$reqNomImage->fetch();

        return $NomImage['img'];
    }
    function ModifierGuide($bdd,$titre,$file_name,$textarea,$date,$idguide){
        $reqModifUneGuide=$bdd->prepare('UPDATE guide SET titre = :titre, images = :fichier, description = :textarea, date_miseajour = :date WHERE id_guide = :idguide');
        $reqModifUneGuide->execute([':titre'=>$titre,':fichier'=>$file_name ,':textarea'=>$textarea,':idguide'=>$idguide,':date'=>$date]);
    }
    function AjouterGuide($bdd,$titre,$img,$textarea,$date){
        $reqCreeUneGuide=$bdd->prepare('INSERT INTO guide(titre, images, description, date_creation) VALUES (:titre,:fichier,:textarea,:date)');
        $reqCreeUneGuide->execute([':titre'=>$titre,':fichier'=>$img ,':textarea'=>$textarea,':date'=>$date]);

    }
    function SupprimerGuide($bdd,$idguide){
        $reqSupprimerGuides=$bdd->prepare('UPDATE guide SET delected=1 WHERE id_guide=:idguide');
        $reqSupprimerGuides->execute([':idguide'=>$idguide]);
    }
    function ImageExistantGuides($bdd,$idguide){
        $reqImageExistant=$bdd->prepare('SELECT COUNT(images) FROM guide WHERE id_guide=:idguide');
        $reqImageExistant->execute([':idguide'=>$idguide]);
        $ImageExistantGuides=$reqImageExistant->fetch();

        return $ImageExistantGuides;
    }
    function NomImageGuides($bdd,$idguide){
        $reqNomImageGuides=$bdd->prepare('SELECT images FROM guide WHERE id_guide=:id_guide');
        $reqNomImageGuides->execute([':id_guide'=>$idguide]);
        $NomImageGuides=$reqNomImageGuides->fetch();

        return $NomImageGuides['images'];
    }
    function ModifCaracteristiques($bdd,$vehicule,$fichiers,$marques,$motorisation,$nb_de_place,$prix,$textareacourt,$textarealong,$boite_de_vitesse,$longueur,$wc_douche,$lit,$lit_supp,$id_caract,$id_img,$id_vehicule){
        $reqModifCaracteristiques=$bdd->prepare('UPDATE caracteristiques_vehicules 
                                                JOIN vehicules ON vehicules.id_vehicule=caracteristiques_vehicules.id_vehicule
                                                JOIN images ON vehicules.id_vehicule=images.id_vehicule
                                                SET vehicules.vehicule=:vehicule,
                                                    images.fichiers=:fichiers,
                                                    caracteristiques_vehicules.marques=:marques,
                                                    caracteristiques_vehicules.motorisation=:motorisation,
                                                    caracteristiques_vehicules.nb_de_place=:nb_de_place,
                                                    caracteristiques_vehicules.prix=:prix,
                                                    caracteristiques_vehicules.desc_short=:desc_short,
                                                    caracteristiques_vehicules.desc_long=:desc_long,
                                                    caracteristiques_vehicules.boite=:boite, 
                                                    caracteristiques_vehicules.longueur=:longueur,
                                                    caracteristiques_vehicules.wc_douche=:wc_douche,
                                                    caracteristiques_vehicules.lit=:lit,
                                                    caracteristiques_vehicules.lit_supp=:lit_supp
                                                WHERE caracteristiques_vehicules.id_caract=:id_caract
                                                AND images.id_img=:id_img
                                                AND vehicules.id_vehicule=:id_vehicule;');
        $reqModifCaracteristiques->execute([':vehicule'=>$vehicule,':fichiers'=>$fichiers,':marques'=>$marques,':motorisation'=>$motorisation,':nb_de_place'=>$nb_de_place,':prix'=>$prix,':desc_short'=>$textareacourt,':desc_long'=>$textarealong,':boite'=>$boite_de_vitesse,':longueur'=>$longueur,':wc_douche'=>$wc_douche,':lit'=>$lit,':lit_supp'=>$lit_supp,':id_caract'=>$id_caract,':id_img'=>$id_img,':id_vehicule'=>$id_vehicule]);//16

    }

    function ImageExistantCaract($bdd, $idimg, $id_caract, $id_vehicule){
        $reqImageExistantCaract=$bdd->prepare('SELECT COUNT(fichiers) 
                                               FROM vehicules,images,caracteristiques_vehicules 
                                               WHERE caracteristiques_vehicules.id_caract=:id_caract 
                                               AND images.id_img=:id_img
                                               AND vehicules.id_vehicule=:id_vehicule
                                               AND images.id_img=vehicules.id_vehicule=images.id_vehicule
                                               AND vehicules.id_vehicule=caracteristiques_vehicules.id_vehicule');
        $reqImageExistantCaract->execute([':id_img'=>$idimg,':id_caract'=>$id_caract,':id_vehicule'=>$id_vehicule]);
        $ImageExistantCaract=$reqImageExistantCaract->fetch();

        return $ImageExistantCaract;
    }
    function NomImageCaract($bdd,$id_img){
        $reqNomImageCaract=$bdd->prepare('SELECT fichiers FROM images WHERE id_img=:id_img');
        $reqNomImageCaract->execute([':id_img'=>$id_img]);
        $NomImageCaract=$reqNomImageCaract->fetch();

        return $NomImageCaract['fichiers'];
    }
    function SupprimerLouer($bdd,$id_caract){
        $reqSupprimerLouer=$bdd->prepare('UPDATE caracteristiques_vehicules SET delected=1 WHERE id_caract=:id_caract');
        $reqSupprimerLouer->execute([':id_caract'=>$id_caract]);
    }

    function SupprimerMessage($bdd,$idmessage){
        $reqSupprimerUnMessage=$bdd->prepare('DELETE FROM message WHERE id_message=:idmessage');
        $reqSupprimerUnMessage->execute([':idmessage'=>$idmessage]);
    }
    function AjouterUneImageSlide($bdd,$img,$id_carouselslide){
        $reqModifImgSlide=$bdd->prepare('UPDATE accueil_carouselslide SET fichiers = :fichier WHERE id_carouselslide = :id_carouselslide');
        $reqModifImgSlide->execute([':fichier'=>$img, ':id_carouselslide'=>$id_carouselslide]);
    }
    function ModifAssurGarantie($bdd,$titre,$desc,$id_assurgarantie){
        $reqModifAssurGarantie=$bdd->prepare('UPDATE accueil_assurgarantie SET titre=:titre, description=:description WHERE id_assurgarantie = :id_assurgarantie');
        $reqModifAssurGarantie->execute([':titre'=>$titre,':description'=>$desc,':id_assurgarantie'=>$id_assurgarantie]);
    }
    function AssurGarantieASuppr($bdd,$id_a_suppr){
        $reqAssurGarantieASuppr=$bdd->prepare('UPDATE accueil_assurgarantie SET delected=1 WHERE id_assurgarantie=:id_assurgarantie');
        $reqAssurGarantieASuppr->execute([':id_assurgarantie'=>$id_a_suppr]);
    }
    function ImageExistantCarousel($bdd,$id_carouselslide){
        $reqImageExistantCarousel=$bdd->prepare('SELECT COUNT(fichiers) FROM accueil_carouselslide WHERE id_carouselslide=:id_carouselslide');
        $reqImageExistantCarousel->execute([':id_carouselslide'=>$id_carouselslide]);
        $ImageExistantCarousel=$reqImageExistantCarousel->fetch();

        return $ImageExistantCarousel;
    }
    function NomImageCarousel($bdd,$id_carouselslide){
        $reqNomImageCarousel=$bdd->prepare('SELECT fichiers FROM accueil_carouselslide WHERE id_carouselslide=:id_carouselslide');
        $reqNomImageCarousel->execute([':id_carouselslide'=>$id_carouselslide]);
        $NomImageCarousel=$reqNomImageCarousel->fetch();

        return $NomImageCarousel['fichiers'];
    }

    function Horaire($bdd){
        $reqHoraire=$bdd->prepare('SELECT * FROM contact_horaire');
        $reqHoraire->execute();
        $Horaire=$reqHoraire->fetchAll();

        return $Horaire;
    }
    function modifierHoraire($bdd, $id_horaire, $matin, $apresmidi){
        $reqmodifierHoraire=$bdd->prepare('UPDATE contact_horaire SET matin = :matin, apres_midi = :apres_midi WHERE id_contact_horaires = :id_horaire');
        $reqmodifierHoraire->execute([':matin'=>$matin,':apres_midi'=>$apresmidi,':id_horaire'=>$id_horaire]);
    }

    function coordonneContact($bdd){
        $reqcoordonneContact=$bdd->prepare('SELECT * FROM contact_num_email');
        $reqcoordonneContact->execute();
        $coordonne=$reqcoordonneContact->fetchAll();

        return $coordonne;
    }
    function modifCoordonneContact($bdd, $email, $num, $adresse, $ville, $dpt){
        $reqmodifCoordonneContact=$bdd->prepare('UPDATE contact_num_email SET email=:email, num=:num, adresse=:adresse, ville=:ville, dpt=:dpt');
        $reqmodifCoordonneContact->execute([':email'=>$email, ':num'=>$num, ':adresse'=>$adresse, ':ville'=>$ville, ':dpt'=>$dpt]);
    }
    function AffichageService($bdd){
        $reqAffichageService=$bdd->prepare('SELECT * FROM services WHERE delected=0');
        $reqAffichageService->execute();
        $AffichageService=$reqAffichageService->fetchAll();

        return $AffichageService;
    }
    function ModifServiceBlocText($bdd,$titre,$bloctext,$id_bloctext){
        $reqModifServiceBlocText=$bdd->prepare('UPDATE services SET titre_bloctext=:titre_bloctext, bloctext=:bloctext WHERE id_bloctext=:id_bloctext');
        $reqModifServiceBlocText->execute([':titre_bloctext'=>$titre,':bloctext'=>$bloctext,':id_bloctext'=>$id_bloctext]);
    }
    function ajouterBlocServices($bdd,$titrebloctext,$bloctextservices){
        $reqajouterBlocServices=$bdd->prepare('INSERT INTO services SET titre_bloctext=:titre_bloctext, bloctext=:bloctext');
        $reqajouterBlocServices->execute([':titre_bloctext'=>$titrebloctext,':bloctext'=>$bloctextservices]);
    }
    function SupprServices($bdd,$id_services){
        $reqSupprServices=$bdd->prepare('UPDATE services SET delected=1 WHERE id_bloctext=:id_bloctext');
        $reqSupprServices->execute([':id_bloctext'=>$id_services]);
    }
    function AffichageServicesMultirisques($bdd){
        $reqAffichageServicesMultirisques=$bdd->prepare('SELECT * FROM services_multirisques WHERE delected=0');
        $reqAffichageServicesMultirisques->execute();
        $AffichageServicesMultirisques=$reqAffichageServicesMultirisques->fetchAll();

        return $AffichageServicesMultirisques;
    }
    
    function ModifServiceMultirisques($bdd, $bloc, $id_services_multirisques){
        $reqModifServiceMultirisques=$bdd->prepare('UPDATE services_multirisques SET bloc=:bloc WHERE id_services_multirisques=:id_services_multirisques');
        $reqModifServiceMultirisques->execute([':bloc'=>$bloc, ':id_services_multirisques'=>$id_services_multirisques]);
    }
    function ajouterBlocServicesMultirisques($bdd,$bloctext){
        $reqajouterBlocServicesMultirisques=$bdd->prepare('INSERT INTO services_multirisques(bloc) VALUES (:bloc)');
        $reqajouterBlocServicesMultirisques->execute([':bloc'=>$bloctext]);
    }
    function supprBlocGarantie($bdd, $id_bloc){
        $reqsupprBlocGarantie=$bdd->prepare('UPDATE services_multirisques SET delected=1 WHERE id_services_multirisques=:idservices_multirisques');
        $reqsupprBlocGarantie->execute([':idservices_multirisques'=>$id_bloc]);
    }
    function AffichageMaps($bdd){
        $reqAffichageMaps=$bdd->prepare('SELECT mapslink FROM maps');
        $reqAffichageMaps->execute();
        $AffichageMaps=$reqAffichageMaps->fetch();

        return $AffichageMaps;
    }
    function ModifMaps($bdd,$mapslink){
        $reqModifMaps=$bdd->prepare('UPDATE maps SET mapslink=:mapslink');
        $reqModifMaps->execute([':mapslink'=>$mapslink]);
    }
    function ajouterCaract($bdd,$marques,$motorisation,$nb_de_place,$prix,$desc_short,$desc_long,$boite,$longueur,$wc_douche,$lit,$lit_supp,$id_vehicule){
        $reqajouterCaract=$bdd->prepare('INSERT INTO caracteristiques_vehicules(marques,motorisation,nb_de_place,prix,desc_short,desc_long,boite,longueur,wc_douche,lit,lit_supp,id_vehicule) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
        $reqajouterCaract->execute([$marques,$motorisation,$nb_de_place,$prix,$desc_short,$desc_long,$boite,$longueur,$wc_douche,$lit,$lit_supp,$id_vehicule]);
    }
    function AfficheCateg($bdd){
        $reqAfficheCateg=$bdd->prepare('SELECT * FROM categ_vehicule');
        $reqAfficheCateg->execute();
        $AfficheCateg=$reqAfficheCateg->fetchAll();

        return $AfficheCateg;
    }
    function ajouterVehicule($bdd,$vehicule,$id_categ,$id_img){
        $reqajouterVehicule=$bdd->prepare('INSERT INTO vehicules(vehicule,id_categ,id_img) VALUES(?,?,?)');
        $reqajouterVehicule->execute([$vehicule,$id_categ,$id_img]);
    }
    function ajouterUneImage($bdd,$NomImage,$id_vehicule){
        $reqajouterUneImage=$bdd->prepare('INSERT INTO images(fichiers,id_vehicule) VALUES(?)');
        $reqajouterUneImage->execute([$NomImage,$id_vehicule]);
    }
    function GuideAffichageAvecIDGuides($bdd, $idguide){
        $reqGuideAffichageAvecIDGuides=$bdd->prepare('SELECT * FROM guide WHERE id_guide=:idguide');
        $reqGuideAffichageAvecIDGuides->execute([':idguide'=>$idguide]);
        $GuideAffichageAvecIDGuides=$reqGuideAffichageAvecIDGuides->fetch();

        return $GuideAffichageAvecIDGuides;
    }
    function visibleCaract($bdd, $idcaract, $visible){
        $reqvisibleCaract=$bdd->prepare('UPDATE caracteristiques_vehicules SET publier=:publier WHERE id_caract=:id_caract');
        $reqvisibleCaract->execute([':publier'=>$visible,':id_caract'=>$idcaract]);
        $visibleCaract=$reqvisibleCaract->fetch();

        return $visibleCaract;
    }

    function visibleOption($bdd, $idoption, $visible){
        $reqvisibleOption=$bdd->prepare('UPDATE option_accessoires SET publier = :publier WHERE id_option=:id_option');
        $reqvisibleOption->execute([':publier'=>$visible,':id_option'=>$idoption]);
        $visibleOption=$reqvisibleOption->fetch();

        return $visibleOption;
    }

    function visibleGuide($bdd, $idguide, $visible){
        $reqvisibleGuide=$bdd->prepare('UPDATE guide SET publier = :publier WHERE id_guide=:id_guide');
        $reqvisibleGuide->execute([':publier'=>$visible,':id_guide'=>$idguide]);
        $visibleGuide=$reqvisibleGuide->fetch();

        return $visibleGuide;
    }

    function visibleService($bdd, $idservices, $visible){
        $reqvisibleService=$bdd->prepare('UPDATE services SET publier = :publier WHERE id_bloctext=:id_bloctext');
        $reqvisibleService->execute([':publier'=>$visible,':id_bloctext'=>$idservices]);
        $visibleService=$reqvisibleService->fetch();

        return $visibleService;
    }
    function AffichageServiceAvecID($bdd, $id_service){
        $reqAffichageServiceAvecID=$bdd->prepare('SELECT * FROM services WHERE id_bloctext=:id_bloctext');
        $reqAffichageServiceAvecID->execute([':id_bloctext'=>$id_service]);
        $AffichageServiceAvecID=$reqAffichageServiceAvecID->fetch();

        return $AffichageServiceAvecID;
    }
    
    function visibleServiceMulti($bdd, $idservices, $visible){
        $reqvisibleServiceMulti=$bdd->prepare('UPDATE services_multirisques SET publier = :publier WHERE id_services_multirisques=:id_services_multirisques');
        $reqvisibleServiceMulti->execute([':publier'=>$visible,':id_services_multirisques'=>$idservices]);
        $visibleServiceMulti=$reqvisibleServiceMulti->fetch();

        return $visibleServiceMulti;
    }

    function AffichageServiceMultiRisquesAvecID($bdd, $idbloc){
        $reqAffichageServiceMultiRisquesAvecID=$bdd->prepare('SELECT * FROM services_multirisques WHERE id_services_multirisques=:idbloc');
        $reqAffichageServiceMultiRisquesAvecID->execute([':idbloc'=>$idbloc]);
        $AffichageServiceMultiRisquesAvecID=$reqAffichageServiceMultiRisquesAvecID->fetch();

        return $AffichageServiceMultiRisquesAvecID;
    }
    function visibleAssurGarantie($bdd, $idassurgarantie, $visible){
        $reqvisibleAssurGarantie=$bdd->prepare('UPDATE accueil_assurgarantie SET publier = :publier WHERE id_assurgarantie=:id_assurgarantie');
        $reqvisibleAssurGarantie->execute([':publier'=>$visible,':id_assurgarantie'=>$idassurgarantie]);
        $visibleAssurGarantie=$reqvisibleAssurGarantie->fetch();

        return $visibleAssurGarantie;
    }
    function AffichageImgSuppl($bdd, $idcaract){
        $reqAffichageImgSuppl=$bdd->prepare('SELECT * FROM images WHERE id_vehicule=:id_vehicule');
        $reqAffichageImgSuppl->execute([':id_vehicule'=>$idcaract]);
        $AffichageImgSuppl=$reqAffichageImgSuppl->fetch();

        return $AffichageImgSuppl;
    }
    function VisibleImgSupp($bdd, $idimgsupp, $visible){
        $reqVisibleImgSupp=$bdd->prepare('UPDATE imgsupp SET publier=:publier WHERE id_imgsupp=:id_imgsupp');
        $reqVisibleImgSupp->execute([':publier'=>$visible,':id_imgsupp'=>$idimgsupp]);
    }
    function VerifIDVehiculeExistant($bdd, $idvehicule){
        $req=$bdd->prepare('SELECT * FROM vehicules WHERE id_vehicule=:id_vehicule');
        $req->execute(['id_vehicule'=>$idvehicule]);
        $VerifIDVehiculeExistant=$req->fetch();

        return $VerifIDVehiculeExistant;
    }
?>