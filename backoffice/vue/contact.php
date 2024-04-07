<?php
include '../vue/header.php';
if(!isset($_SESSION['idUser'])){
    header('Location:../public/index.php');
}
$AffichageMaps=AffichageMaps($bdd);
?>
<div class="col-10">
    <div class="row">
        <div class="col-6">
            <div class="card mt-4">
                <div class="card-header">
                    Horaires
                </div>
                <table class="table">
                    <th>Horaire</th>
                    <th>Matin</th>
                    <th>Après-midi</th>
                    <?php $Horaire=Horaire($bdd);
                    foreach($Horaire as $hor){
                    ?>
                    <form action="../controller/traitement_contact.php?action=horaire" method="post">
                        <tr>
                            <td><?php echo $hor['jour']?></td>
                            <td><input class="form-control" type="text" name="matin" value="<?php echo $hor['matin']?>"></td>
                            <td><input class="form-control" type="text" name="apres_midi" value="<?php echo $hor['apres_midi']?>"></td>
                            <input name="id_contact_horaires" value="<?php echo $hor['id_contact_horaires']?>" hidden>
                            <td><input type="submit" class="btn btn-primary" value="Modifier"></td>
                        </tr>
                        
                    </form>
                    <?php } ?>
                    
                </table>
            </div>
        </div>
        <div class="col-5">
            <div class="card mt-4">
                <div class="card-header">
                    Coordonnées
                </div>
                <table class="table">
                    <?php
                    $coordonnee=coordonneContact($bdd);
                    foreach($coordonnee as $coor){
                    ?>
                    <form class="form-control" action="../controller/traitement_contact.php?action=contact" method="post"> 
                        <input value="<?php echo $coor['id_contact_num_email']?>" hidden>
                        <tr>
                            <td>Email</td>
                            <td><input class="form-control" type="text" name="email" value="<?php echo $coor['email']?>" id="" style="width: 500px;"></td>
                        </tr>
                        <tr>
                            <td>Numéro de téléphone</td>
                            <td><input class="form-control" type="text" name="num" value="<?php echo $coor['num']?>"></td>
                        </tr>
                        <tr>
                            <td>Adresse</td>
                            <td><input class="form-control" type="text" name="adresse" value="<?php echo $coor['adresse']?>"></td>
                        </tr>
                        <tr>
                            <td>Ville</td>
                            <td><input class="form-control" type="text" name="ville" value="<?php echo $coor['ville']?>"></td>
                        </tr>
                        <tr>
                            <td>Département</td>
                            <td><input class="form-control" type="text" name="dpt" value="<?php echo $coor['dpt']?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="text-center"><input type="submit" class="btn btn-primary" value="Modifier"></div>
                            </td>
                        </tr>
                    </form>
                    <?php } ?>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header">Localisation de l'entreprise</div>
                <h5>Localisation actuel</h5>
                <div>
                    <?php echo $AffichageMaps['mapslink']; ?>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Nouvelle Localisation</h5>
                </div>
                <table class="m-3">
                    <form class="form-control" action="../controller/traitement_contact.php?action=localisation" method="post">
                        <tr>
                            <td><textarea class="form-control" type="text" name="mapslink" id="mapslink" cols=80 onkeyup="mapspreview();"></textarea></td>
                        </tr>
                        <tr>
                            <td><div id="preview"></div></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" value="Modifier">
                                </div>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function mapspreview(){
        let mapspreview=document.getElementById('mapslink').value;
        document.getElementById('preview').innerHTML=mapspreview;
    }
</script>