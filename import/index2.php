<?php /** @noinspection ForgottenDebugOutputInspection */

use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';
require '../modele/connexionpdo.php';

echo '<h1>Parse books.xslx</h1><pre>';
if ($xlsx = SimpleXLSX::parse('Classeur1.xlsx')) {
    $caracteristique = $xlsx->rows();
    foreach ($caracteristique as $caract){
        $nomMarque = $caract[0];
        $motorisation = $caract[1];
        $nb_de_place = $caract[2];
        $prix = $caract[3];
        $boite = $caract[4];
        $longueur = $caract[5];
        $wc_douche =$caract[6];
        $lit = $caract[7];
        $lit_supp = $caract[8];
        $id_vehicule = $caract[9];
        // requete préparée INSERT INTO produits..
        //$reqInsertProd = $bdd->prepare('INSERT INTO produits(nom_produit, prix_unit) VALUES(:nomProd, :prixUnit)');
        //$reqInsertProd->execute([':nomProd'=>$nomProd, ':prixUnit'=>$prixUnit]);

        //$idCateg = $bdd->lastInsertId();

        $reqInsertProd = $bdd->prepare('INSERT INTO caracteristiques_vehicules(marques, motorisation, nb_de_place, prix, boite, longueur, wc_douche, lit, lit_supp, id_vehicule) 
                                                                        VALUES(:Marques, :motorisation, :nb_de_place, :prix, :boite, :longueur, :wc_douche, :lit, :lit_supp, :id_vehicule)');
        $reqInsertProd->execute([':Marques'=>$nomMarque, ':motorisation'=>$motorisation, ':nb_de_place'=>$nb_de_place, ':prix'=>$prix, ':boite'=>$boite, ':longueur'=>$longueur, ':wc_douche'=>$wc_douche, ':lit'=>$lit, ':lit_supp'=>$lit_supp, ':id_vehicule'=>$id_vehicule]);
        //print_r($prod);
        //echo '<br>';
    }
    
} else {
    echo SimpleXLSX::parseError();
}
echo '<pre>';
