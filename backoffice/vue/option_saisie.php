<table class="table table-bordered table-striped">
    <form action="../controller/traitement_modifieroption.php?action=ajouter" method="post" enctype='multipart/form-data'>
        <thead class="text-uppercase text-center">
            <th>#</th>
            <th>à saisir</th>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td>Titre</td>
                <td><input type="text" class="form-control" name="titre" id="floatingInput1"></td>
            </tr>
            <tr class="text-center fw-bolder">
                <td colspan="2">Changer l'image</td>
            </tr>
            <tr>
                <td colspan="2"><input class="form-control" name="fichier" type="file" id="formFile"></td>
            </tr>
            <tfoot class="text-center">
                <td colspan="2"><input type="submit" value="Ajouter" class="btn btn-primary"></td>
            </tfoot>
            <tr>
                
            </tr>
        </tbody> 
    </form>
</table>