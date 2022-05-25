<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Information Réservation'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">


    <?php if(!isset($_GET['id'])): ?>

    <h1 class="mb-5 text-center">Détails d'une réservation</h1>
    <form action="index.php?page=administration" method="GET" class="mb-4 d-flex flex-column">
        <div class="input-group mb-3">
            <label for="selectReservation" class="form-label w-25 d-none d-sm-block">Sélectionner une réservation*</label>
            <select name="selectReservation" id="selectReservation" class="form-select rounded">
                <optgroup label="Sélectionnez une facture">
                    <?php echo selectReservations(); ?>
                </optgroup>
            </select>
        </div>
        <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
    </form>

    <?php else: ?>
        
        <h1 class="mb-5 text-center">Détails de la réservation N°<?= $_GET['id']; ?></h1>
            
            <p class="fs-3"><span class="fw-bold">Facture N° : </span> <?= $details['idInvoice'].' du '.date('d/m/Y', strtotime($details['date'])); ?></p>
            <p class="fs-3"><span class="fw-bold">Client : </span> <?= $details['lastname'].' '.$details['firstname']; ?></p>
            <p class="fs-3"><span class="fw-bold">Dates : </span> <?= date('d/m/Y', strtotime($details['startDate'])).' - '.date('d/m/Y', strtotime($details['endDate'])); ?></p>
            <hr>
            <p class="fs-3">
                <span class="fw-bold">Chambres :</span>
                <ul>
                    <?php foreach($detailsRoomsBooked as $detailsRoomBooked): ?>
                        <li class="fs-4"><?= '<span class="fw-bold">'.$detailsRoomBooked['designation'].'</span> - '.number_format($detailsRoomBooked['price'], 2).' €';?></li>
                    <?php endforeach; ?>
                </ul>
            </p>
            <hr>
            <p class="fs-3"><span class="fw-bold">Total chambres : </span><?= number_format($details['sumRooms'], 2).' €';?></p>
            <p class="fs-3"><span class="fw-bold">Total Extras : </span><?= number_format($details['sumExtras'], 2).' €';?></p>
            <p class="fs-3"><span class="fw-bold">Total Restaurant : </span><?= number_format($details['sumRestaurant'], 2).' €';?></p>
            <hr>
            <p class="fs-3"><span class="fw-bold">Total Réservation : </span><?= number_format($total, 2).' €';?></p>
            <hr>
            <p class="fs-3"><span class="fw-bold">Acompte : </span><?= number_format($details['advance'], 2).' €';?></p>
            <p class="fs-3"><span class="fw-bold">Reste à payer : </span><?= number_format($reste, 2).' €';?></p>
            <p class="fs-3"><span class="fw-bold">Ristourne accordé : </span><?= number_format($details['discount'], 2).' %';?></p>
            <p class="fs-3"><span class="fw-bold">Montant Ristourne : </span><?= number_format($ristourne, 2).' €';?></p>
            <hr>
            <p class="fs-3"><span class="fw-bold">Net à payer : </span><?= number_format($net, 2).' €';?></p>
            <hr>

            <div class="w-100">
                <div class="w-25 ms-auto d-flex align-items-center">
                    <a href="index.php?page=administration&section=invoices&action=updateReservation&id=<?php echo $_GET['id']; ?>" class="btn w-50 text-center"><img src="public/resources/images/gestion/modifier.png" alt="modifier reservation" class="w-50"><br>Modifier</a>
                    <a href="index.php?page=administration&section=invoices&action=detailsInvoice&id=<?php echo $details['idInvoice']; ?>" class="btn w-50 text-center"><img src="public/resources/images/gestion/voir.png" alt="details facture" class="w-50"><br>Facture</a>
                </div>
            </div>

    <?php endif; ?>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');