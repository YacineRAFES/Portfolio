
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    <?php
        $AffichageImgSlide=AfficherImageSlide($bdd);
        foreach($AffichageImgSlide as $indice => $AffImgSlide){
            if($indice==0){ 
                echo '<div class="carousel-item active">';
            }else{
                echo '<div class="carousel-item">';
            }
    ?>
      <img src="img/<?php echo $AffImgSlide['fichiers'] ?>" class="d-block w-100" alt="...">
    </div>
    <?php
        }
    ?>
    </div>
</div>
<div class="container-xl d-flex flex-wrap justify-content-evenly mt-5 text-center">
    <?php
    $AfficherAssurGarantie=AfficherAssurGarantie($bdd);
    foreach($AfficherAssurGarantie as $AffAssurGarantie){
    ?>
    <div class="card border-info mb-3" style="max-width: 20rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $AffAssurGarantie['titre']?></h5>
            <p class="card-text"><?php echo $AffAssurGarantie['description']?></p>
        </div>
    </div>
    <?php } ?>
</div>
<div class="container-xl my-5">
    <h3>Découvrez nos camping car</h3>
    <div class="d-flex">
        <div class="col-md-4">
            <a href="louer"><img src="img/Vanamenage.png" class="card-img-top" alt="..."></a>
        </div>
        <div class="col-md-5">
            <p class="fs-4">Vous allez pouvoir choisir un camping-car neuf le plus adapté à vos besoins :
            en famille, en couple, entre amis... Tous nos camping-cars se conduisent 
            avec votre permis voiture (permis B) et disposent d'une douche 
            et de toilettes.</p>
        </div>
    </div>
</div>
<div class="container-xl my-5">
    <h3>Nos guides personnalisés de road trip</h3>
    <div class="d-flex flex-wrap justify-content-center mt-2">
        <?php
            $affichageGuides=afficherGuides($bdd);
            foreach ($affichageGuides as $guides){
        ?>
        <a href="" class="text-decoration-none">
            <div class="card m-3" style="width: 18rem;">
                <img src="img/<?php echo $guides['images'] ?>" class="card-img-top" style="object-fit: cover; height: 9vw;" alt="...">
                <div class="card-body">
                    <p class="card-text text-center fw-bolder text-uppercase"><?php echo $guides['titre'] ?></p>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
</div>