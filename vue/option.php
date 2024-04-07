<div class="container">
    <div class="d-flex mb-3 flex-wrap justify-content-center align-content-stretch">
        <?php
        $AffichageOption=AffichageOption($bdd);
        foreach($AffichageOption as $AffOption){
        ?>
        <div class="card text-center m-2 pb-2" style="width: 18rem;">
            <img src="img/<?php echo $AffOption['img']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="align-text-bottom">
                        <?php echo $AffOption['titre_option']?>
                    </div>
                </h5>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

