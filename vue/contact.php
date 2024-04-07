<div class="container mt-4">
<?php
    if (isset($_GET['success'])){
        echo '<p class="alert alert-success">'. $_GET['success'].'</p>';
    }
?>
    <div class="row">
        <div class="col-12 col-lg-6">
            <h1>Contact</h1>
            <h5 class="mt-3">Ouverture de notre agence :</h5>
            <table>
                <th>Jour</th>
                <th class="pe-5">Matin</th>
                <th>Après-midi</th>
                <?php
                $Horaire=Horaire($bdd);
                foreach ($Horaire as $hor){
                
                ?>
                
                <tr>
                    <td class="text-capitalize pe-3 py-2"><?php echo $hor['jour']?></td>
                    <td><?php echo $hor['matin']?></td>
                    <td><?php echo $hor['apres_midi']?></td>
                </tr>
                <?php } ?>
            </table>
            <h5 class="mt-3">Pour nous contacter :</h5>
            <?php
            $coordonne=coordonneContact($bdd);
                foreach($coordonne as $coor){
            ?>
            <p><?php echo $coor['email'] ?></p>
            <p><?php echo $coor['num'] ?></p>
            <p><?php echo $coor['adresse'] ?></p>
            <p><?php echo $coor['dpt'] ?> <?php echo $coor['ville'] ?></p>
            <?php } ?>
        </div>
        <div class="col-6 d-none d-lg-block">
            <div class="maps">
                <?php $AffichageMaps=AffichageMaps($bdd); echo $AffichageMaps['mapslink'] ?>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-6 text-center offset-md-3 mb-5">
            <div class="border rounded">
                <form action="message" method="post">
                    <h4 class="m-2">Envoyez-nous un message ci-dessous :</h4>
                    <div class="mb-3 mt-3  mx-2">
                        <label for="exampleFormControlInput1" class="form-label">Votre adresse email</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Votre adresse email">
                    </div>
                    <div class="mb-3  mx-2">
                        <label for="exampleFormControlInput1" class="form-label">Objet du message</label>
                        <input type="text" class="form-control" name="objet" id="exampleFormControlInput1" placeholder="Objet du message">
                    </div>
                    <div class="mb-3  mx-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>