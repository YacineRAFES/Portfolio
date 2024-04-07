<?php
include '../vue/header.php';
$LouerAffichageAvecIDCaract=LouerAffichageAvecIDCaract($bdd,$_GET['idcaract']);
?>
<div class="col-6 offset-2">
    <a href="../public/index.php?page=4" class="btn btn-primary my-3"><- RETOUR</a>
    <table class="table table-bordered">
    <form class="form-control" action="../controller/traitement_modifierlouer.php?action=modifier" method="post" enctype='multipart/form-data'>
        <tr>
            <td>Titre</td>
            <td><input class="form-control" name="vehicule" type="text" value="<?php echo $LouerAffichageAvecIDCaract['vehicule']?>"></td>
        </tr>
            <input name="id_caract" value="<?php echo $LouerAffichageAvecIDCaract['id_caract']?>" hidden>
            <input name="id_vehicule" value="<?php echo $LouerAffichageAvecIDCaract['id_vehicule']?>" hidden>
        <tr>
            <td>Marques</td>
            <td><input class="form-control" name="marques" type="text" value="<?php echo $LouerAffichageAvecIDCaract['marques']?>"></td>
        </tr>
        <tr>
            <td>Motorisation</td>
            <td><input class="form-control" name="motorisation" type="text" value="<?php echo $LouerAffichageAvecIDCaract['motorisation']?>"></td>
        </tr>
        <tr>
            <td>Nb de places</td>
            <td><input class="form-control" name="nb_de_place" type="number" value="<?php echo $LouerAffichageAvecIDCaract['nb_de_place']?>"></td>
        </tr>
        <tr>
            <td>Prix</td>
            <td><input class="form-control" name="prix" type="text" value="<?php echo $LouerAffichageAvecIDCaract['prix']?>"></td>
        </tr>
        <tr>
            <td>Description court</td>
            <td><textarea class="form-control" name="textareacourt" id="" maxlength="200" cols="90" rows="10"><?php echo $LouerAffichageAvecIDCaract['desc_short']?></textarea></td>
        </tr>
        <tr>
            <td>Description longue</td>
            <td><textarea class="form-control" name="textarealong" id="" cols="90" rows="10"><?php echo $LouerAffichageAvecIDCaract['desc_long']?></textarea></td>
        </tr>
        <tr>
            <td>Boite de vitesse</td>
            <td><input class="form-control" name="boite_de_vitesse" type="text" value="<?php echo $LouerAffichageAvecIDCaract['boite']?>"></td>
        </tr>
        <tr>
            <td>Longueur</td>
            <td><input class="form-control" name="longueur" type="text" value="<?php echo $LouerAffichageAvecIDCaract['longueur']?>"></td>
        </tr>
        <tr>
            <td>WC Douche</td>
            <td><input class="form-control" name="wc_douche" type="text" value="<?php echo $LouerAffichageAvecIDCaract['wc_douche']?>"></td>
        </tr>
        <tr>
            <td>Lit</td>
            <td><input class="form-control" name="lit" type="text" value="<?php echo $LouerAffichageAvecIDCaract['lit']?>"></td>
        </tr>
        <tr>
            <td>Lit supplémentaire</td>
            <td><input class="form-control" name="lit_supp" type="text" value="<?php echo $LouerAffichageAvecIDCaract['lit_supp']?>"></td>
        </tr>
        <tr>
            <td colspan="2"  class="text-center"><h5>L'image principale</h5></td>
        </tr>
        <tr>
            <td colspan="2"  class="text-center">
                <img class="img-fluid" src="..\..\img\<?php echo $LouerAffichageAvecIDCaract['fichiers']?>" alt="">
            </td>
        </tr>
        
        <tr>
            <td colspan="2"  class="text-center"><h5></h5></td>
            
        </tr>
        <tr>
            <td colspan="2"  class="text-center"><input class="form-control" name="fichier" type="file" id="img-upload"></td>
        </tr>
        <tr>
            <td colspan="2"  class="text-center"><input type="submit" class="btn btn-primary" value="Modifier"></td>
        </tr>
    </form>
    
</table>
</div>