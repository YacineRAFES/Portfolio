<?php
include '../vue/header.php';
$AffOption=AffichageOptionAvecID($bdd,$_GET['idoption']);
?>
<div class="col-6 offset-2">
    <a href="../public/index.php?page=6" class="btn btn-primary my-3"><- RETOUR</a>
<table class="table table-bordered table-striped">
    <form action="../controller/traitement_modifieroption.php?action=modifier" method="post" enctype='multipart/form-data'>
        <input name="id_option" value="<?php echo $AffOption['id_option']?>" hidden>
        <thead>
            <th>#</th>
            <th>Modification</th>
        </thead>
        <tbody class="table-group-divider text-center">
            <tr>
                <td>Titre</td>
                <td><input class="form-control" name="titre" type="text" id="titre" value="<?php echo $AffOption['titre_option'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2">Image actuel :</td>
            </tr>
            <tr>
                <td colspan="2"><img src="../../assets/images/<?php echo $AffOption['img'] ?>" id="imageactuel" width="250px" alt=""></td>
            </tr>
            <tr>
                <td colspan="2">Changer l'image </td>
            </tr>
            <tr>
                <td colspan="2"><input class="form-control" name="fichier" type="file" id="formFile"></td>
            </tr>
        </tbody>
        <tfoot class="text-center">
            <td colspan="2"><input type="submit" class="btn btn-primary" value="Modifier"></td>
        </tfoot>
</table>
</div>