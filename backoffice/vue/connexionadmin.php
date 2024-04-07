<?php
if(isset($_SESSION['idUser'])){
    header('Location:../public/index.php?page=2');
}
?>
<div class="container-lg">
    <div class="text-center fw-bolder fs-3">Connexion de Backoffice</div>
    <?php 
        if (isset($_GET['erreur'])){
            if ($_GET['erreur'] == 'identifiants'){
    ?>
    <p class="alert alert-danger" role="alert">Identifiants incorrects</p>
    <?php
            }
        }
    ?>
        <div class="row ">
            <div class="col-6 offset-3">
                <form method="post" action="../controller/traitement_connexion.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
                        <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </form>
            </div>
        </div>
      
</div>