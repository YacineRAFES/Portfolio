<div class="col-7 offset-2">
    <table class="table table-bordered table-striped">
        <form class="form-control" action="../controller/traitement_ajouterguide.php?action=ajouter" method="post" enctype='multipart/form-data'>
            <thead class="text-uppercase text-center">
                <th>#</th>
                <th>à saisir</th>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>Titre</td>
                    <td><input type="text" class="form-control" name="titre" id="exampleFormControlInput1"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea class="form-control" name="textarea" placeholder="Description" id="floatingTextarea"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">Ajouter une image</td>
                </tr>
                <tr>
                    <td colspan="2"><input class="form-control" name="fichier" type="file" id="formFile"></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center"><input type="submit" class="btn btn-primary" value="Ajouter une nouvelle guide"></td>
                </tr>
            </tbody>
        </form>
    </table>
</div>

