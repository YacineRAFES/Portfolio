<div class="col-6 offset-2">
    <h4 class="text-center">Services</h4>
    <table class="table table-bordered table-striped">
        <thead class="text-uppercase text-center">
            <th>#</th>
            <th>à saisir</th>
        </thead>
        <tbody class="table-group-divider">
            <form class="form-control" action="../controller/traitement_services.php?action=ajouterBlocServices" method="post">
            <tr>
                <td>Titre</td>
                <td><input class="form-control" type="text" name="titre"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea class="form-control" name="bloctext" id="" cols="30" rows="10" ></textarea></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><div class="text-center"><input type="submit" class="btn btn-primary" value="Ajouter"></div></td>
            </tr>
            </form>
        </tfoot>
    </table>
    <h4 class="text-center">Services MultiRisques</h4>
    <table class="table table-bordered table-striped">
        <thead class="text-uppercase text-center">
            <th>#</th>
            <th>à saisir</th>
        </thead>
        <tbody class="table-group-divider">
            <form class="form-control" action="../controller/traitement_services.php?action=ajouterBlocServicesMultirisques" method="post">
            <tr>
                <td>Titre</td>
                <td><input class="form-control" type="text" name="titre"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><div class="text-center"><input type="submit" class="btn btn-primary" value="Ajouter"></div></td>
            </tr>
            </form>
        </tfoot>
    </table>
</div>