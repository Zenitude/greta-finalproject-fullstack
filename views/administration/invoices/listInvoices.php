<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des factures'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">

<h1 class="mb-5 text-center">Liste des factures</h1>

    <form method="POST" action="index.php?page=administration&section=invoices&action=listInvoices" class="mb-4 d-flex">
    <div class="d-flex flex-column flex-md-row align-items-center">
        <div class="d-flex flex-column w-100 w-sm-50 me-sm-1">
            <label for="selectSearchInvoice" class="opacity-0">Filtre de recherche</label>
            <select name="selectSearchInvoice" id="selectSearchInvoice" class="rounded w-100 ps-1 border">
                <option value="idInvoice">Numéro</option>
                <option value="idReservationI">Réservation</option>
                <option value="lastname">Nom client</option>
                <option value="firstname">Prénom client</option>
            </select>
        </div>
        <div class="search position-relative w-100 w-sm-25">
            <label for="searchBar" class="opacity-0 d-block">Rechercher</label>
            <input type="search" placeholder="Rechercher" id="searchBar" name="searchInvoice" class="rounded w-100 border ps-1">
            <button class="btn-search position-absolute"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    </form>

    <div class="table-responsive-lg">
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
                    <th>Ristourne</th>
                    <th>Net à payer</th>
                    <th class="text-center text-white bg-white">Aperçu</th>
                    <th class="text-center text-white bg-white">Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($invoices as $invoice): ?>
                    <?php 
                        $total = $invoice['sumRooms'] + $invoice['sumExtras'] + $invoice['sumRestaurant']; 
                        $ristourne = ($total - $invoice['advance']) * ($invoice['discount']);
                    ?>
                    <?php $net = ($total - $invoice['advance']) * (1-$invoice['discount']); ?>
                    <tr class="text-center">
                        <td><?= $invoice['idInvoice']; ?></td>
                        <td><?= $invoice['idReservationI']; ?></td>
                        <td><?= date('d/m/Y', strtotime($invoice['date'])); ?></td>
                        <td><?= $invoice['lastname'].' '.$invoice['firstname']; ?></td>
                        <td><?= number_format($invoice['sumRooms'],2,',',' ').' €'; ?></td>
                        <td><?= number_format($invoice['sumExtras'],2,',',' ').' €'; ?></td>
                        <td><?= number_format($invoice['sumRestaurant'],2,',',' ').' €'; ?></td>
                        <td><?= number_format($total,2,',',' ').' €'; ?></td>
                        <td><?= number_format($invoice['advance'],2,',',' ').' €'; ?></td>
                        <td><?= number_format($ristourne,2,',',' ').' € ('.($invoice['discount']*100).' %)'; ?></td>
                        <td><?= number_format($net,2,',',' ').' €'; ?></td>
                        <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=invoices&action=detailsInvoice&id='.$invoice['idInvoice']; ?>"<?php echo $invoice['idInvoice']; ?>"><img src="public/resources/images/gestion/voir.png" alt="Détails facture" class="img-fluid w-100"></a></td>
                        <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=invoices&action=updateInvoice&id='.$invoice['idInvoice']; ?>"><img src="public/resources/images/gestion/editer.png" alt="Modifier facture" class="img-fluid w-75"></a></td>
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