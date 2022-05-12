<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des factures'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">

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
                    <td><?= $invoice['idReservationH']; ?></td>
                    <td><?= date('d/m/Y', strtotime($invoice['date'])); ?></td>
                    <td><?= $invoice['lastname'].' '.$invoice['firstname']; ?></td>
                    <td><?= $invoice['sumRooms'].' €'; ?></td>
                    <td><?= $invoice['sumExtras'].' €'; ?></td>
                    <td><?= $invoice['sumRestaurant'].' €'; ?></td>
                    <td><?= $total.' €'; ?></td>
                    <td><?= $invoice['advance'].' €'; ?></td>
                    <td><?= $invoice['discount'].' €'; ?></td>
                    <td><?= $net.' €'; ?></td>
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=invoices&action=updateInvoice&id='.$idInvoice; ?>"><img src="public/resources/images/gestion/editer.png" alt="Modifier client" class="img-fluid"></a></td>
                    <td class="text-center" style="width:5%;"><a href="<?php echo 'index.php?page=administration&section=invoices&action=deleteInvoice&id='.$idInvoice; ?>"<?php echo $id; ?>"><img src="public/resources/images/gestion/supprimer-red.png" alt="Supprimer client" class="img-fluid"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');