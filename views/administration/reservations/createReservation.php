<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - '.$titleSup; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>
<div class="container py-5">

    <?php if(isset($_POST['selectReservationCustomer'])): ?>
        <?php 
            //$customerId = $_POST['selectReservationCustomer'];
            $titleSup = 'Sélection des dates'; 
        ?>

        <h1 class="text-center">Vérifier disponibilité des chambres</h1>
        <form method="POST" action="index.php?page=administration&section=reservations&action=createReservation" class="my-4 d-flex justify-content-center align-items-center">
            <div class="form-inline w-25">
                <label for="dateStartReservation">Date de début</label>
                <input type="date" id="dateStartReservation" name="dateStartReservation" class="form-control">
            </div>
            <div class="form-inline mx-3 w-25">
                <label for="dateEndReservation">Date de début</label>
                <input type="date" id="dateEndReservation" name="dateEndReservation" class="form-control">
            </div>
            <input type="text" class="d-none" name="idCustomer" value="<?= $_POST['selectReservationCustomer']; ?>">
            <button class="btn bg-beige border align-self-end">Vérifier</button>
        </form>

    <?php elseif(isset($_POST['dateStartReservation']) && isset($_POST['dateEndReservation'])): ?>
        <?php 
            //$customerId = $_POST['idCustomer'];
            //$dateStart = $_POST['dateStartReservation'];
            //$dateEnd = $_POST['dateEndReservation'];
            $titleSup = 'Sélection de(s) chambre(s)'; 
        ?>

        <h1 class="text-center">Chambres disponibles pour la période</h1>
        <p class="text-center fs-2"><?php echo 'du '.date('d/m/Y', strtotime($_POST['dateStartReservation'])).' au '.date('d/m/Y', strtotime($_POST['dateEndReservation'])); ?></p>

        <form action="index.php?page=administration&section=reservations&action=createReservation&option=finishReservation" method="POST">
            <table class="table">
                <thead class="text-center">
                    <th></th>
                    <th>Numéro</th>
                    <th>Désignation</th>
                    <th>Lits</th>
                    <th>Salle(s) de bain</th>
                    <th>Toilette(s)</th>
                    <th>Chambre(s) d'enfant</th>
                    <th>Sallon(s)</th>
                    <th>Terraces</th>
                    <th>Prix/Jour</th>
                </thead>
                <tbody class="text-center">
                <?php foreach($rooms as $room): ?>
                    <?php if($room['number'] != $verifDispo['number']): ?>
                        <tr>
                            <td><input type="checkbox" name="<?= str_replace(' ', '_', $room['designation']) ; ?>" value="<?= $room['idRoom']; ?>"></td>
                            <td><?= $room['number']; ?></td>
                            <td><?= $room['designation']; ?></td>
                            <td><?= $room['beds']; ?></td>
                            <td><?= $room['bathrooms']; ?></td>
                            <td><?= $room['toiletes']; ?></td>
                            <td><?= $room['childrooms']; ?></td>
                            <td><?= $room['sallons']; ?></td>
                            <td><?= $room['terraces']; ?></td>
                            <td><?= number_format($room['price'], 2).' €'; ?></td>
                        </tr>
                    <?php else: ?>
                        <p>Aucune chambre disponible</p>      
                    <?php endif; ?>	
                <?php endforeach; ?>
                </tbody>
            </table>
            <input type="text" class="d-none" name="idCustomer" value="<?= $_POST['idCustomer']; ?>">
            <input type="date" class="d-none" name="dateStart" value="<?= $_POST['dateStartReservation']; ?>">
            <input type="date" class="d-none" name="dateEnd" value="<?=  $_POST['dateEndReservation']; ?>">
            <button class="btn bg-beige border">Choisir</button>
        </form>

    <?php else: ?>
        <?php $titleSup = 'Sélection du client'; ?>
        <h1 class="text-center">Sélectionner un client pour la réservation</h1>
        <form action="index.php?page=administration&section=reservations&action=createReservation" method="POST" class="my-4 d-flex flex-column">
                <div class="input-group mb-3">
                    <label for="selectReservationCustomer" class="form-label w-25 d-none d-sm-block">Sélectionner un client*</label>
                    <select name="selectReservationCustomer" id="selectReservationCustomer" class="form-select rounded">
                        <optgroup label="Sélectionnez un client" selected>
                        </optgroup>
                        <?php selectCustomers(); ?>
                    </select>
                </div>
                <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
        </form>

    <?php endif; ?>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');