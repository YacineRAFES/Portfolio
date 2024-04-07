<div class="col-2">
    <nav class="nav nav-pills flex-column bg-body-tertiary" style="height:100vh;" data-bs-theme="light ">
        <a class="navbar-brand" href="#">
            <img src="../../assets/images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-center">
            BackOffice ACC
        </a>
        <a class="nav-link <?php if ($_GET['page'] == 2){ ?> active <?php } ?>" <?php if ($_GET['page'] == 2){ ?> aria-current="page"<?php } ?> href="../public/index.php?page=2">Tableau de bord</a>
        <a class="nav-link <?php if ($_GET['page'] == 3){ ?> active <?php } ?>" <?php if ($_GET['page'] == 3){ ?> aria-current="page"<?php } ?> href="../public/index.php?page=3">Accueil</a>
        <a class="nav-link <?php if ($_GET['page'] == 4){ ?> active <?php } ?>" <?php if ($_GET['page'] == 4){ ?> aria-current="page"<?php } ?> href="../public/index.php?page=4">Louer</a>
        <a class="nav-link <?php if ($_GET['page'] == 5){ ?> active <?php } ?>" <?php if ($_GET['page'] == 5){ ?> aria-current="page"<?php } ?> href="../public/index.php?page=5">Guides</a>
        <a class="nav-link <?php if ($_GET['page'] == 6){ ?> active <?php } ?>" <?php if ($_GET['page'] == 6){ ?> aria-current="page"<?php } ?> href="../public/index.php?page=6">Option</a>
        <a class="nav-link <?php if ($_GET['page'] == 8){ ?> active <?php } ?>" <?php if ($_GET['page'] == 8){ ?> aria-current="page"<?php } ?> href="../public/index.php?page=8">Services</a>
        <a class="nav-link <?php if ($_GET['page'] == 7){ ?> active <?php } ?>" <?php if ($_GET['page'] == 7){ ?> aria-current="page"<?php } ?> href="../public/index.php?page=7">Contact</a>
        <a class="nav-link" href="../controller/traitement_deconnexion.php">Deconnexion</a>
    </nav>
</div>