<div class="container-md my-3">
    <div class="row">
        <?php
            $afficherGuides=afficherGuides($bdd);
                foreach($afficherGuides as $guide){
        ?>
        <div class="col-3">
            <a href="#<?php echo $guide['id_guide'] ?>"><?php echo $guide['titre'] ?></a>
        </div>
        <?php } ?>
    </div>
    <div class="row mt-3">
        <?php
            $afficherGuides=afficherGuides($bdd);
                foreach($afficherGuides as $guide){
        ?>
        <div class="col-md-12">
            <div class="card text-bg-dark">
                <img src="img/<?php echo $guide['images'] ?>" class="card-img" alt="..." style="object-fit: cover; height: 9vw;">
                <div class="card-img-overlay">
                    <h1 id="<?php echo $guide['id_guide'] ?>" class="card-title text-center"><?php echo $guide['titre'] ?></h1>
                </div>
            </div>
            
            <p><?php echo $guide['description'] ?></p>
            <p class="fst-italic fw-lighter">Crée le : <?php $date=strtotime($guide['date_creation']); $dte=date('d/m/Y', $date); echo $dte?>. 
            <?php if($guide['date_miseajour']){?>Mise à jour le : <?php $date=strtotime($guide['date_miseajour']); $dte=date('d/m/Y', $date); echo $dte.'.';} ?></p>
        </div>
        <?php } ?>
    </div>
</div>