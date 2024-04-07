<?php
include '../vue/header.php';
if(!isset($_SESSION['idUser'])){
    header('Location:../public/index.php');
}
?>
    <div class="col-10">
        <a href="index.php?page=5&s=2" class="btn btn-outline-primary my-5" type="button" >
            Saisie
        </a>
        <a href="index.php?page=5&s=1" class="btn btn-outline-primary my-5" type="button" >
            Gestion
        </a>
        <?php
            if(isset($_GET['s'])) {
                if ($_GET['s'] == 1){
                    include '../vue/gestion_g.php';
                }
                if ($_GET['s'] == 2){
                    include '../vue/saisie_g.php';
                }
            }
            else  {
                include '../vue/gestion_g.php';
            }
        ?>
    </div>
<script type="module">
    import Autogrow from "https://cdn.jsdelivr.net/npm/vanilla-autogrow@1.0.0/autogrow.min.js";
    var inst = new Autogrow();
</script>