<div class="container">
    <h3 class="fw-bold mt-3 text-center">Quels sont les garanties et les assurances que nous proposons ?</h3>
    <?php 
    $AffichageService=AffichageService($bdd);
    foreach($AffichageService as $AffService){
        
    ?>
    <h4><?php echo $AffService['titre_bloctext'] ?></h4>
    <p class="mb-5"><?php echo $AffService['bloctext'] ?></p>
    <?php } ?>
    
    <h4>Garanties Multirisques</h4>

    
    <div class="row">
        <div class="d-flex flex-wrap">
            <?php 
                $AffichageServicesMultirisques=AffichageServicesMultirisques($bdd);
                foreach($AffichageServicesMultirisques as $AffServMultiRis){
            ?>
            <div class="col-10 col-lg-3 border border-success rounded fw-semibold mx-5 my-3 py-3 d-flex align-items-center justify-content-center text-center">
            <?php echo $AffServMultiRis['bloc']?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>