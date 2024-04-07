<div class="col-6 offset-2">
    <table class="table table-bordered table-striped">
        <form class="form-control" action="../controller/traitement_modifierlouer.php?action=ajouter" method="post" enctype='multipart/form-data'>
            <thead class="text-uppercase text-center">
                <th>#</th>
                <th>A saisir</th>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>Nom du véhicule</td>
                    <td><input class="form-control" name="vehicule" type="text"></td>
                </tr>
                <tr>
                    <td>Marques</td>
                    <td><input class="form-control" name="marques" type="text"></td>
                </tr>
                <tr>
                    <td>Motorisation</td>
                    <td><input class="form-control" name="motorisation" type="text"></td>
                </tr>
                <tr>
                    <td>Nb de places</td>
                    <td><input class="form-control" name="nb_de_place" type="number"></td>
                </tr>
                <tr>
                    <td>Prix</td>
                    <td><input class="form-control" name="prix" type="text"> </td>
                </tr>
                <tr>
                    <td>Description court</td>
                    <td><textarea class="form-control" name="textareacourt" id="" cols="90" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Description longue</td>
                    <td><textarea class="form-control" name="textarealong" id="" cols="90" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Boite de vitesse</td>
                    <td><input class="form-control" name="boite_de_vitesse" type="text"></td>
                </tr>
                <tr>
                    <td>Longueur</td>
                    <td><input class="form-control" name="longueur" type="text"></td>
                </tr>
                <tr>
                    <td>WC Douche</td>
                    <td><input class="form-control" name="wc_douche" type="text"></td>
                </tr>
                <tr>
                    <td>Lit</td>
                    <td><input class="form-control" name="lit" type="text"></td>
                </tr>
                <tr>
                    <td>Lit supplémentaire</td>
                    <td><input class="form-control" name="lit_supp" type="text"></td>
                </tr>
                <tr>
                    <td>Catégorie du véhicule</td>
                    <td>
                        <select class="form-control" name="categ" id="">
                            <?php 
                            $AfficheCateg=AfficheCateg($bdd);
                            foreach($AfficheCateg as $AffCateg){
                            ?>
                            <option value="<?php echo $AffCateg['id_categ'] ?>"><?php echo $AffCateg['camping_car'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="text-center" colspan="2"><h5>Ajouter l'image :</h5></td>
                </tr>
                <tr>
                    <td colspan="2"><input class="form-control" name="fichier" type="file"></td>
                </tr>
                <tr>
                    <td class="text-center" colspan="2">
                        <input type="submit" class="btn btn-primary" value="Ajouter">
                    </td>
                </tr>
            </tbody>
        </form>
    </table>
</div>