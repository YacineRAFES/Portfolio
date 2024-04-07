<?php
    include '../vue/header.php';
    if(!isset($_SESSION['idUser'])){
        header('Location:../public/index.php');
    }
    
?>
<div class="col-10">
    <div class="row">
    <div class="col-12 m-5 d-flex flex-wrap">
        <a href="../public/index.php?page=3" class="remove-underline">
            <div class="card text-center mx-3" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Accueil</h5>
                </div>
            </div>
        </a>
        <a href="../public/index.php?page=4" class="remove-underline">
            <div class="card text-center mx-3" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Louer</h5>
                </div>
            </div>
        </a>
        <a href="../public/index.php?page=5" class="remove-underline">
            <div class="card text-center mx-3" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Guides</h5>
                </div>
            </div>
        </a>
        <a href="../public/index.php?page=6" class="remove-underline">
            <div class="card text-center mx-3" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Option</h5>
                </div>
            </div>
        </a>
        <a href="../public/index.php?page=7" class="remove-underline">
            <div class="card text-center mx-3" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Contact</h5>
                </div>
            </div>
        </a>
        <a href="../public/index.php?page=8" class="remove-underline">
            <div class="card text-center mx-3" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Services</h5>
                </div>
            </div>
        </a>
        
    </div>
        <div class="col-4">
            <div class="card mt-4" style="width: 25rem;">
                <div class="card-header">
                    Boîte de réception
                </div>
                
                <ul class="list-group list-group-flush">
                <?php
                    $reqAffichageMessages=$bdd->prepare("SELECT * FROM message");
                    $reqAffichageMessages->execute();
                    $AffichageMessages=$reqAffichageMessages->fetchAll();
                    foreach($AffichageMessages as $AffMessage){
                ?>
                    <li class="list-group-item fw-bold text-uppercase"><a href="" data-bs-toggle="modal" data-bs-target="#message<?php echo $AffMessage['id_message']?>" class="text-decoration-none"><?php echo $AffMessage['email'] .' '. $AffMessage['objet']?></a></li>
                    <div class="modal fade" id="message<?php echo $AffMessage['id_message']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $AffMessage['objet']?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label>Email :</label>
                                        <input class="form-control" type="text" placeholder="Email" value="<?php echo $AffMessage['email']?>" aria-label="Disabled input example" disabled readonly>
                                    </div>
                                    <div class="form-group">
                                        <div class="border-rounded"><?php echo $AffMessage['message']?>
                                    </div> 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="suppr(<?php echo $AffMessage['id_message']?>)">Supprimer</button>
                                    <a class="btn btn-secondary" >Envoyer une réponse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </ul>
            </div>
        </div>
        
        <!--<div class="col-5">
            <div class="card mt-4" >
                <div class="card-header">
                    Envoyer un mail :
                </div>
                <form action="">
                    <div class="m-3 form-floating">
                        <input type="email" class="form-control" id="floating1" placeholder="name@example.com">
                        <label for="floating1">Adresse email</label>
                    </div>
                    <div class="m-3 form-floating">
                        <input type="text" class="form-control" id="floating2" placeholder="Objet du message">
                        <label for="floating2">Objet</label>
                    </div>
                    <div class="m-3 form-floating">
                        <textarea class="form-control" id="floating3" rows="9"></textarea>
                        <label for="floating3">Message</label>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Envoyer">
                    </div>
                </form>
            </div>
        </div>-->
    </div>
    
</div>
<script>
    function suppr(a){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            setTimeout("location.reload(true);");
        }
    xhttp.open("GET", "../controller/traitement_supprmessage.php?idmessage="+a, true);
    xhttp.send();
    }
</script>