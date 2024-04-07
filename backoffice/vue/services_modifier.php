<?php $AffService=AffichageServiceAvecID($bdd, $_GET['idservices']);
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
        <form class="form-control" action="../controller/traitement_services.php?action=modifservices" method="post">
            <input value="<?php echo $AffService['id_bloctext']?>" name="id_bloctext" hidden>
        <tr>
            <td>Titre</td>
            <td><input class="form-control" type="text"  value="<?php echo $AffService['titre_bloctext']?>" name="titre"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea class="form-control" name="bloctext" id="" cols="30" rows="10" ><?php echo $AffService['bloctext']?></textarea></td>
        </tr>
    </tbody>
    <tfoot>
        <td colspan="2"><div class="text-center"><input type="submit" class="btn btn-primary" value="Modifier"></td>
        </form>
    </tfoot>
</div>