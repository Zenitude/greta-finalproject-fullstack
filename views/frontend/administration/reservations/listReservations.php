<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des réservations'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<h1 class="mb-5 text-center">Liste des Réservations</h1>


<div class="container py-5">

    <form method="GET" class="mb-4">
            <div class="search">
                <i class="iconSearch fa-search fa-facebook-square fa-2x"></i>
                <label for="searchBar" class="opacity-0 d-block">Rechercher</label>
                <input type="search" placeholder="Rechercher" id="searchBar" name="searchReservation" class="rounded w-25 ps-1">
            </div>
    </form>

    <table class="table table-hover table-striped">
        <thead>
            <tr class="text-center bg-beige">
                <th>Numéro</th>
                <th>Client</th>
                <th>Dates</th>
                <th>Montant</th>
                <th>Reste à payer</th>
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
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=reservations&action=updateReservation&id='.$idReservation ?>"><img src="public/resources/images/gestion/editer.png" alt="Modifier client" class="img-fluid"></a></td>
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=reservations&action=deleteReservation&id='.$idReservation ?>"<?php echo $id; ?>"><img src="public/resources/images/gestion/supprimer-red.png" alt="Supprimer client" class="img-fluid"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');