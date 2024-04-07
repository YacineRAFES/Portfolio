<?php
include '../vue/header.php';
$GuideAffichageAvecIDGuides=GuideAffichageAvecIDGuides($bdd, $_GET['idguide']);
?>

<div class="col-10">
    
<a href="../public/index.php?page=5" class="btn btn-primary m-2"><- RETOUR</a>
    <div class="row">
        <div class="col-6 offset-2">
            <form method="post" action="../controller/traitement_modifierguides.php?action=modifier" enctype='multipart/form-data'>
                <input type="text" name="idguide" value="<?php echo $GuideAffichageAvecIDGuides['id_guide']?>" hidden>
                    <div class="my-2">
                        <h1>
                            <input type="text" class="form-control" name="titre" value="<?php echo $GuideAffichageAvecIDGuides['titre']?>" id="floatinginput1">
                        </h1>
                    </div>
                        <div class="form-floating">
                            <textarea class="form-control" style="height:50vh;" placeholder="Leave a comment here" id="floatingTextarea" name="textarea"><?php echo $GuideAffichageAvecIDGuides['description']?></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>
                        <h5>Image actuel :</h5>
                        <img id="image" class="img-thumbnail" src="../../assets/images/<?php echo $GuideAffichageAvecIDGuides['images']?>" alt="">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Changer l'image :</label>
                            <input class="form-control" name="fichier" type="file" id="formFile">
                        </div>
                    <input type="submit" class="btn btn-primary mb-5" value="Modifier">
            </form>
        </div>
    </div>
</div>