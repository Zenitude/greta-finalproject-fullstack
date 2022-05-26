<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des factures'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">

<h1 class="mb-5 text-center">Liste des factures</h1>

    <form method="POST" action="index.php?page=administration&section=invoices&action=listInvoices" class="mb-4 d-flex">
    <div class="d-flex flex-column me-1">
            <label for="selectSearchInvoice" class="opacity-0">Sélectionner une catégorie de recherche</label>
            <select name="selectSearchInvoice" id="selectSearchInvoice" class="rounded ps-1 border">
                <option value="idInvoice">Numéro</option>
                <option value="idReservationI">Réservation</option>
            </select>
        </div>
        <div class="search position-relative w-25">
            <label for="searchBar" class="opacity-0 d-block">Rechercher</label>
            <input type="search" placeholder="Rechercher" id="searchBar" name="searchInvoice" class="rounded w-100 ps-1">
            <button class="btn-search position-absolute"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>

    <table class="table table-hover table-striped">
        <thead class="text-center bg-beige">
            <tr>
                <th>Numéro</th>
                <th>Réservation</th>
                <th>Date</th>
                <th>Client</th>
                <th>Chambres</th>
                <th>Extras</th>
                <th>Restaurant</th>
                <th>Total</th>
                <th>Acompte</th>
                <th>Remise</th>
                <th>Net à payer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($invoices as $invoice): ?>
                <?php $total = $invoice['sumRooms'] + $invoice['sumExtras'] + $invoice['sumRestaurant']; ?>
                <?php $net = ($total - $invoice['advance']) * (1-$invoice['discount']); ?>
                <tr class="text-center">
                    <td><?= $invoice['idInvoice']; ?></td>
                    <td><?= $invoice['idReservationI']; ?></td>
                    <td><?= date('d/m/Y', strtotime($invoice['date'])); ?></td>
                    <td><?= $invoice['lastname'].' '.$invoice['firstname']; ?></td>
                    <td><?= $invoice['sumRooms'].' €'; ?></td>
                    <td><?= $invoice['sumExtras'].' €'; ?></td>
                    <td><?= $invoice['sumRestaurant'].' €'; ?></td>
                    <td><?= $total.' €'; ?></td>
                    <td><?= $invoice['advance'].' €'; ?></td>
                    <td><?= $invoice['discount'].' €'; ?></td>
                    <td><?= $net.' €'; ?></td>
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=invoices&action=detailsInvoice&id='.$invoice['idInvoice']; ?>"<?php echo $invoice['idInvoice']; ?>"><img src="public/resources/images/gestion/voir.png" alt="Détails facture" class="img-fluid"></a></td>
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=invoices&action=updateInvoice&id='.$invoice['idInvoice']; ?>"><img src="public/resources/images/gestion/editer.png" alt="Modifier facture" class="img-fluid"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');