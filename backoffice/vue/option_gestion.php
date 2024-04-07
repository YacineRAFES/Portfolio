<table class="table table-bordered table-striped">
    <thead class="text-uppercase text-center">
        <th>Photo</th>
        <th>Titre</th>
        <th>Modifier</th>
        <th>Visibilité</th>
        <th>Supprimer</th>
    </thead>
    <tbody>
        <?php
            $AffichageOption=AffichageOption($bdd);
            foreach($AffichageOption as $AffOption){
        ?>
        <tr id="<?php echo $AffOption['id_option']?>" class="text-center">
            <td><img src="../../assets/images/<?php echo $AffOption['img']?>" class="img-fluid rounded-start" alt="..." width="130px"></td>
            <td><?php echo $AffOption['titre_option'] ?></td>
            <td><a href="../public/index.php?page=11&idoption=<?php echo $AffOption['id_option']?>" class="btn btn-primary">Modifier</a></td>
            <td><a href="../controller/traitement_modifieroption.php?action=visible&visibilite=<?php echo $AffOption['publier'] ?>&idoption=<?php echo $AffOption['id_option'] ?>"><?php if($AffOption['publier']==1){?><img src="assets/images/eye-regular.svg" alt="" width="50px"><?php }else{?><img src="assets/images/eye-slash-solid.svg" alt="" width="50px"><?php }?></a></td>
            <td><a href="../controller/traitement_modifieroption.php?action=supprimer&idoption=<?php echo $AffOption['id_option']?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>