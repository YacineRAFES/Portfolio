<?php $AffichageServiceMultiRisquesAvecID=AffichageServiceMultiRisquesAvecID($bdd, $_GET['idbloc']);
include '../vue/header.php';
?>
<div class="col-6 offset-1">
    <a href="../public/index.php?page=8&s=1" class="btn btn-primary my-3"><- RETOUR</a>
<table class="table table-bordered table-striped">
    <thead class="text-uppercase text-center">
        <th>#</th>
        <th>modification</th>
    </thead>
    <tbody class="table-group-divider">
        <form class="form-control" action="../controller/traitement_services.php?action=modifblocgarantie" method="post">
            <input value="<?php echo $AffichageServiceMultiRisquesAvecID['id_services_multirisques']?>" name="id_services_multirisques" hidden>
        <tr>
            <td>Titre</td>
            <td><input class="form-control" type="text"  value="<?php echo $AffichageServiceMultiRisquesAvecID['bloc']?>" name="bloc"></td>
        </tr>
    </tbody>
    <tfoot>
        <td colspan="2"><div class="text-center"><input type="submit" class="btn btn-primary" value="Modifier"></td>
        </form>
    </tfoot>
</div>