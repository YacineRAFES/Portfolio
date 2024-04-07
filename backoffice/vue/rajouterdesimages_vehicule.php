<?php
    include 'header.php';
    $AffichageImgSuppl=AffichageImgSuppl($bdd, $_GET['idvehicule']);
?>
<div class="col-6 offset-2 mt-3">
    <div class="row">
        <div class="card" style="width: 18rem;">
            <img src="../../public/assets/images/<?php echo $AffichageImgSuppl['fichiers']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nom du fichier:</h5>
                <p class="card-text"><?php echo $AffichageImgSuppl['fichiers']?></p>
                <a href="#" class="btn btn-primary m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></a>
                <a href="#" class="btn btn-primary m-1">Changer l'image</a>
                <a href="#" class="btn btn-primary m-1">Image principal: <?php if($AffichageImgSuppl['main'] == '1'){?>Activé<?php }else{?>Désactivé<?php }?></a>
            </div>
        </div>
        <div class="card border-0" style="width: 18rem;">
        <a class=" m-auto" href="../controller/traitement_ajout_image.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
            </svg>
        </a>
        </div>
    </div>
</div>