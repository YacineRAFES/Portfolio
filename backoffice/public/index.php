<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <?php
            session_start();
            require "../modele/fonctions.php";
            
            if (!isset($_GET['page'])){ // si $_GET['page'] n'existe pas
                include '../vue/connexionadmin.php';
            }else{ // si $_GET['page'] existe
                if ($_GET['page'] == 1){
                    include '../vue/connexionadmin.php';
                }
                if ($_GET['page'] == 2){
                    include '../vue/tableaudebord.php';
                }
                if ($_GET['page'] == 3){
                    include '../vue/accueil.php';
                }
                if ($_GET['page'] == 4){
                    include '../vue/louer2.php';
                }
                if ($_GET['page'] == 5){
                    include '../vue/guides.php';
                }
                if ($_GET['page'] == 6){
                    include '../vue/option.php';
                }
                if ($_GET['page'] == 7){
                    include '../vue/contact.php';
                }
                if ($_GET['page'] == 8){
                    include '../vue/services.php';
                }
                if ($_GET['page'] == 9){
                    include '../vue/louermodifier.php';
                }
                if ($_GET['page'] == 10){
                    include '../vue/guidesmodifier.php';
                }
                if ($_GET['page'] == 11){
                    include '../vue/optionmodifier.php';
                }
                if ($_GET['page'] == 12){
                    include '../vue/services_modifier.php';
                }
                if ($_GET['page'] == 13){
                    include '../vue/services_multirisques_modifier.php';
                }
                if ($_GET['page'] == 14){
                    include '../vue/rajouterdesimages_vehicule.php';
                }
            }
        ?>
        </div>
    </div>
</body>
</html>