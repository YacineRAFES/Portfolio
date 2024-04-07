
<?php
    include '../vue/header.php';
    if(!isset($_SESSION['idUser'])){
        header('Location:../public/index.php');
    }
?>
<div class="col-10 flex-wrap mt-4">
    <div class="row">
        <div class="col-4 border rounded border-primary me-2"> 
            <h5>Les images du slide</h5>
        
            <?php 
                $AfficherImageSlide=AfficherImageSlide($bdd);
                foreach($AfficherImageSlide as $indice => $AffImgSlide){
                    $indice++;
            ?>
                <div class="card mb-3 te" style="max-width: 500px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../../assets/images/<?php echo $AffImgSlide['fichiers'] ?>" class="img-fluid rounded-start">
                        </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Image Slide n°<?php echo $indice ?></h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $AffImgSlide['id_carouselslide'] ?>">Modifier</button>
                                    <div class="modal fade" id="Modal<?php echo $AffImgSlide['id_carouselslide']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Image Slide n°<?php echo $indice ?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="../controller/traitement_modifieraccueil.php?action=carouselslide" enctype='multipart/form-data'>
                                                    <div class="modal-body">
                                                        <table>
                                                            <th><h5>Image actuel</h5></th>
                                                            <tr>
                                                                <td><img id="image" class="img-thumbnail" src="../../assets/images/<?php echo $AffImgSlide['fichiers']?>" alt=""></td>
                                                                <input name="idcarouselslide" value="<?php echo $AffImgSlide['id_carouselslide'] ?>" hidden>
                                                            </tr>
                                                            <th><h5>Changer l'image (l'image doit être en 1920x700px)</h5></th>
                                                            <tr>
                                                                <td><input class="form-control" name="fichier" type="file" id="formFile"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            <?php } ?>
        </div>
        <div class="col-6 border rounded border-primary">
            <h5 class="text-center">Partie assurances et garanties</h5>
            <div class="row d-flex flex-wrap justify-content-center">
            <?php
                $AfficherAssurGarantie=AfficherAssurGarantie($bdd);
                foreach($AfficherAssurGarantie as $AffAssurGarantie){
            ?>
                <div class="col-5 border rounded border-primary m-2 py-2">
                    
                    <form method="post" action="../controller/traitement_modifieraccueil.php?action=assurgarantie">
                        <table>
                            <div class="form-outline w-50">
                                <th><label class="form-label" for="titre">Titre</label></th>
                                <tr>
                                    <td><input class="form-control" type="text" width="50px" name="titre" id="titre" value="<?php echo $AffAssurGarantie['titre'] ?>"></td>
                                </tr>
                            </div>
                            <input name="id_assurgarantie" value="<?php echo $AffAssurGarantie['id_assurgarantie'] ?>" hidden>
                            <th><label for="desc">Description</label></th>
                            <tr>
                                <td><textarea class="form-control" type="text" name="desc" id="desc" value="" cols="40" rows="5"><?php echo $AffAssurGarantie['description'] ?></textarea></td>
                            </tr>    
                        </table>
                        <input type="submit" class="btn btn-primary mt-2" value="Modifier">
                        <a href="../controller/traitement_modifieraccueil.php?action=suppr&idassurgarantie=<?php echo $AffAssurGarantie['id_assurgarantie'] ?>" class="btn btn-danger mt-2">Supprimer</a>
                        <a href="../controller/traitement_modifieraccueil.php?action=visible&visibilite=<?php echo $AffAssurGarantie['publier'] ?>&idassurgarantie=<?php echo $AffAssurGarantie['id_assurgarantie'] ?>"><?php if($AffAssurGarantie['publier']==1){?><img src="assets/images/eye-regular.svg" alt="" width="50px"><?php }else{?><img src="assets/images/eye-slash-solid.svg" alt="" width="50px"><?php }?></a>
                    </form>
                </div>
                <?php } ?>
                <div class="col-12 mt-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalAjouter">
                    Ajouter un bloc
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="ModalAjouter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="../controller/traitement_modifieraccueil.php?action=ajouterassurgarantie" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un bloc</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <div class="form-floating">
                                                <th><label class="form-label" for="titre">Titre</label></th>
                                                <tr>
                                                    <td><input class="form-control" type="text" name="titre" id="titre"></td>
                                                </tr>
                                                <th><label for="desc">Description</label></th>
                                                <tr>
                                                    <td><textarea class="form-control" type="text" name="desc" id="desc" value="" cols="40" rows="5"></textarea></td>
                                                </tr> 
                                            </div>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>