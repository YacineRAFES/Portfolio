<div class="col-6 offset-2">
                                 
    <table class="table table-bordered table-striped">
        <thead class="text-uppercase text-center">
            <th>Type du véhicule</th>
            <th>Modifier</th>
            <th>Visibilité</th>
            <th>Rajouter des Images</th>
            <th>Supprimer</th>
        </thead>
        <tbody class="table-group-divider">
            
        <?php
            $LouerAffichage=LouerAffichage($bdd);
            foreach($LouerAffichage as $LouerAff){
        ?>
            <tr id="<?php echo $LouerAff['id_caract'] ?>" class="text-center">
                <td><?php echo $LouerAff['vehicule']?></td>
                <td><a class="btn btn-primary" href="index.php?page=9&idcaract=<?php echo $LouerAff['id_caract'] ?>">Modifier</a></td>
                <td>
                    <a href="../controller/traitement_modifierlouer.php?action=visible&visibilite=<?php echo $LouerAff['publier'] ?>&idcaract=<?php echo $LouerAff['id_caract'] ?>"><?php if($LouerAff['publier']==1){?><img src="assets/images/eye-regular.svg" alt="" width="50px"><?php }else{?><img src="assets/images/eye-slash-solid.svg" alt="" width="50px"><?php }?></a>
                </td>
                <td>
                    <a href="../public/index.php?page=14&idvehicule=<?php echo $LouerAff['id_vehicule'] ?>"><img src="assets/images/file-circle-plus-solid.svg" width="50px" alt=""></a>
                </td>
                <td>
                    <a href="../controller/traitement_modifierlouer.php?action=supprimer&idcaract=<?php echo $LouerAff['id_caract'] ?>" class="btn btn-outline-danger">
                    Supprimer
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    /*function visible(a,idCaract){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            let visible = JSON.parse(this.responseText);
            console.log(visible.publier);
            if(visible.publier == 1){
                tout = '<img src="assets/images/eye-regular.svg" alt="" width="50px">';
            }else{
                tout = '<img src="assets/images/eye-slash-solid.svg" alt="" width="50px">';
            }
            document.getElementById('imgeye').innerHTML=tout;
        }
        xhttp.open("GET", "../controller/traitement_modifierlouer.php?action=visible&visibilite=" + a + "&idcaract=" + idCaract, true);
        xhttp.send();
    }*/
</script>