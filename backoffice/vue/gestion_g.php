<div class="col-6 offset-2">
    <table class="table table-bordered table-striped">
        <thead class="text-uppercase text-center">
            <th>Titre</th>
            <th>Supprimer</th>
            <th>Visibilité</th>
            <th>Modifier</th>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $AffichageGuide=GuideAffichage($bdd);
                foreach ($AffichageGuide as $AffGuides){
            ?>
            <tr class="text-center">
                <td class="text-start"><?php echo $AffGuides['titre']?></td>
                <td><a href="../controller/traitement_modifierguides.php?action=supprimer" class="btn btn-danger">Supprimer</a></td>
                <td>
                    <a href="../controller/traitement_modifierguides.php?action=visible&visibilite=<?php echo $AffGuides['publier'] ?>&idguide=<?php echo $AffGuides['id_guide'] ?>"><?php if($AffGuides['publier']==1){?><img src="assets/images/eye-regular.svg" alt="" width="50px"><?php }else{?><img src="assets/images/eye-slash-solid.svg" alt="" width="50px"><?php }?></a>
                </td>
                <td>
                    <a href="../public/index.php?page=10&idguide=<?php echo $AffGuides['id_guide']?>" class="btn btn-primary">
                        Modifier
                    </a>
                </td>
            </tr>
        <?php } ?>  

        </tbody>
        <tfoot>

        </tfoot>
    