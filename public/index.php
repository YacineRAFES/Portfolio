<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php
        if (!isset($_GET['page'])){ // si $_GET['page'] n'existe pas
            
        }else{ // si $_GET['page'] existe
            if ($_GET['page'] == 1){
                echo '<title>Accueil</title>';
            }
            if ($_GET['page'] == 2){
                echo '<title>Louer</title>';
            }
            if ($_GET['page'] == 3){
                echo '<title>Services</title>';
            }
            if ($_GET['page'] == 4){
                echo '<title>Contact</title>';
            }
            if ($_GET['page'] == 5){
                echo '<title>Option et accessoires</title>';
            }
            if ($_GET['page'] == 6){
                echo '<title>Guides</title>';
            }
        }
    ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <?php
        include '../vue/header.php';
        require "../modele/fonctions.php";
        if (!isset($_GET['page'])){ // si $_GET['page'] n'existe pas
            include ('../vue/accueil.php');
        }else{ // si $_GET['page'] existe
            if ($_GET['page'] == 1){
                include ('../vue/accueil.php');
            }
            if ($_GET['page'] == 2){
                include ('../vue/louer.php');
            }
            if ($_GET['page'] == 3){
                include ('../vue/services.php');
            }
            if ($_GET['page'] == 4){
                include ('../vue/contact.php');
            }
            if ($_GET['page'] == 5){
                include ('../vue/option.php');
            }
            if ($_GET['page'] == 6){
                include ('../vue/guides.php');
            }
        }
        ?><!--footer-->
        <?php include '../vue/footer.php'; 
        ?>
</body>
</html>