<div class="col-10 offset-1">
    <h4 class="text-center">Services</h4>
    <table class="table table-bordered table-striped">
        <thead class="text-uppercase text-center">
            <th>Titre</th>
            <th>Description</th>
            <th>Supprimer</th>
            <th>visibilité</th>
            <th>modifier</th>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $AffichageService=AffichageService($bdd);
            foreach($AffichageService as $AffService){
            ?>
                <tr class="text-center" id="a<?php echo $AffService['id_bloctext'] ?>">
                    <td class="text-start"><?php echo $AffService['titre_bloctext']?></td>
                    <td class="text-start"><?php echo $AffService['bloctext']?></td>
                    <td><a href="../controller/traitement_services.php?action=supprservices&idservices=<?php echo $AffService['id_bloctext'] ?>" class="btn btn-danger">Supprimer</a></td>
                    <td><a href="../controller/traitement_services.php?action=visible1&visibilite=<?php echo $AffService['publier'] ?>&idservices=<?php echo $AffService['id_bloctext'] ?>"><?php if($AffService['publier']==1){?><img src="assets/images/eye-regular.svg" alt="" width="50px"><?php }else{?><img src="assets/images/eye-slash-solid.svg" alt="" width="50px"><?php }?></a></td>
                    <td><a href="../public/index.php?page=12&idservices=<?php echo $AffService['id_bloctext'] ?>" class="btn btn-primary">Modifier</a></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
    <h4 class="text-center mt-5">Services Multirisques</h4>
    <table class="table table-bordered table-striped">
        <thead class="text-uppercase text-center">
            <th>Titre</th>
            <th>Supprimer</th>
            <th>visibilité</th>
            <th>modifier</th>
        </thead>
        <tbody class="table-group-divider text-center">
            <?php 
                $AffichageServicesMultirisques=AffichageServicesMultirisques($bdd);
                foreach($AffichageServicesMultirisques as $AffServMulti){
            ?>
            <tr id="b<?php echo $AffServMulti['id_services_multirisques'] ?>">
                <td class="text-start"><?php echo $AffServMulti['bloc']?></td>
                <td><a class="btn btn-danger" href="../controller/traitement_services.php?action=supprimerblocgaranties&id_bloc=<?php echo $AffServMulti['id_services_multirisques']?>">Supprimer</a></td>
                <td><a href="../controller/traitement_services.php?action=visible2&visibilite=<?php echo $AffServMulti['publier'] ?>&id_bloc=<?php echo $AffServMulti['id_services_multirisques'] ?>"><?php if($AffServMulti['publier']==1){?><img src="assets/images/eye-regular.svg" alt="" width="50px"><?php }else{?><img src="assets/images/eye-slash-solid.svg" alt="" width="50px"><?php }?></a></td>
                <td><a class="btn btn-primary text-center" href="../public/index.php?page=13&idbloc=<?php echo $AffServMulti['id_services_multirisques'] ?>">Modifier</a></td>
                
            </tr>
            <?php }?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>