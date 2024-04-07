<div class="container-xl mt-3">
    <h3 class="text-center">Voici nos Camping Car que nous proposons</h3>
</div>
<div class="container-xl justify-content-center d-flex flex-wrap">
    <?php
        $affToutModele=afficherToutModele($bdd);
        foreach ($affToutModele as $indice => $afftout){
            $indice++;
    ?>
    
    <div class="card m-3" style="width: 18rem;">
        <img src="img/<?php echo $afftout['img']?>" class="card-img-top bg-warning bg-gradient" alt="...">
        <div class="card-body" style="object-fit:cover; height: 28vh;">
            <h5 class="card-title"><?php echo $afftout['vehicule']?></h5>
            <p class="card-text" style="text-overflow: ellipsis;"><?php echo $afftout['desc_short']?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Dimension&nbsp;:&nbsp;<?php echo $afftout['longueur'] ?></li>
            <li class="list-group-item"><?php echo $afftout['nb_de_place'] ?> places</li>
            <li class="list-group-item"><?php echo $afftout['prix'] ?> €/jour</li>
        </ul>
        <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $indice ?>">
                Cliquez pour plus d'information
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?php echo $indice ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Caractéristiques du véhicule</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <img class="img-fluid" src="img/<?php echo $afftout['img'] ?>" alt=""> -->
                            <div id="carouselExampleIndicators" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img\Capucine-familiale.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img\Capucine-familiale.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img\Capucine-familiale.png" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <?php echo $afftout['desc_long'] ?>
                                </div>
                            </div>
                            <table class=" table table-bordered">
                                <tr>
                                    <th>Boîte</th>
                                    <th>Dimension</th>
                                    <th>WC/Douche</th>
                                    <th>Lit</th>
                                    <th 
                                    <?php if ($afftout['lit_supp'] == NULL){
                                            echo 'style="display: none;"';
                                        }else{
                                            echo '';
                                        } 
                                    ?>>Lit supplémentaire</th>
                                </tr>
                                <tr>
                                    <td><?php echo $afftout['boite'] ?></td>
                                    <td><?php echo $afftout['longueur'] ?></td>
                                    <td><?php echo $afftout['wc_douche']?></td>
                                    <td><?php echo $afftout['lit']?></td>
                                    <td <?php if ($afftout['lit_supp'] == NULL){
                                            echo 'style="display: none;"';
                                        }else{
                                            echo '';
                                        } 
                                    ?>><?php echo $afftout['lit_supp']?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
 
</div>