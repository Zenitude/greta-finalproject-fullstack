<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des réservations'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>



<div class="container py-5">
    <h1 class="mb-5 text-center">Liste des Réservations</h1>

    <form method="POST" action="index.php?page=administration&section=reservations&action=listReservations" class="mb-4 d-flex">
    <div class="d-flex flex-column flex-md-row align-items-center">
        <div class="d-flex flex-column w-100 w-sm-50 me-sm-1">
            <label for="selectSearchReservation" class="opacity-0">Filtre recherche</label>
            <select name="selectSearchReservation" id="selectSearchReservation" class="rounded w-100 ps-1 border">
                <option value="idReservation">Numéro</option>
                <option value="lastname">Nom client</option>
                <option value="firstname">Prénom client</option>
                <option value="startDate">Date de début</option>
                <option value="endDate">Date de fin</option>
            </select>
        </div>
        <div class="search position-relative w-100 w-sm-25">
            <label for="searchReservation" class="opacity-0">Rechercher</label>
            <input type="search" placeholder="Rechercher" id="searchReservation" name="searchReservation" class="rounded w-100 border ps-1">
            <button class="btn-search position-absolute"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    </form>

    <div class="table-responsive-lg">
        <table class="table table-hover table-striped">
            <thead>
                <tr class="text-center bg-beige">
                    <th>Numéro</th>
                    <th>Client</th>
                    <th>Dates</th>
                    <th>Montant</th>
                    <th>Reste à payer</th>
                    <th class="text-center text-white bg-white">Aperçu</th>
                    <th class="text-center text-white bg-white">Modifier</th>
                    <th class="text-center text-white bg-white">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reservations as $reservation): ?>
                    <?php if(isset($reservation['idReservation'])){ $idReservation = $reservation['idReservation'];} ?>
                    <?php $montant = $reservation['sumRooms'] + $reservation['sumExtras'] + $reservation['sumRestaurant']; ?>
                    <?php $restant = ($montant - $reservation['advance']) * (1-$reservation['discount']); ?>
                    <tr class="text-center">
                        <td><?= $idReservation; ?></td>
                        <td><?= $reservation['lastname'].' '.$reservation['firstname']; ?></td>
                        <td><?= date('d/m/Y', strtotime($reservation['startDate'])).' - '.date('d/m/Y', strtotime($reservation['endDate']));?></td>
                        <td><?= $montant.' €'; ?></td>
                        <td><?= $restant.' €'; ?></td>
                        <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=reservations&action=detailsReservation&id='.$idReservation ?>"><img src="public/resources/images/gestion/voir.png" alt="Détails réservation" class="img-fluid w-100"></a></td>
                        <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=reservations&action=updateReservation&id='.$idReservation ?>"><img src="public/resources/images/gestion/editer.png" alt="Modifier réservation" class="img-fluid w-75"></a></td>
                        <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=reservations&action=deleteReservation&id='.$idReservation ?>"<?php echo $id; ?>"><img src="public/resources/images/gestion/supprimer-red.png" alt="Supprimer réservation" class="img-fluid w-75"></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');