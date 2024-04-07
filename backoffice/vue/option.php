<?php
include '../vue/header.php';
if(!isset($_SESSION['idUser'])){
    header('Location:../public/index.php');
}
?>
<div class="col-10">
    <a href="index.php?page=6&s=1" class="btn btn-outline-primary my-5" type="button" >
        Saisie
    </a>
    <a href="index.php?page=6&s=2" class="btn btn-outline-primary my-5" type="button" >
        Gestion
    </a>
    <div class="row">
        <div class="col-6 offset-2">
            <?php
            if(isset($_GET['s'])) {
                if ($_GET['s'] == 1){
                    include '../vue/option_saisie.php';
                }
                if ($_GET['s'] == 2){
                    include '../vue/option_gestion.php';
                }
            }
            else  {
                include '../vue/option_gestion.php';
            }

            ?>
        </div>
    </div>