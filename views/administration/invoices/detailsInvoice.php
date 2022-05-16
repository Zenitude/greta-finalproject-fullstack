<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Information facture'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">

    <?php if(!isset($_GET['id'])): ?>

        <h1 class="mb-5 text-center">Détails d'une facture</h1>
        <form action="index.php?page=administration" method="GET" class="mb-4 d-flex flex-column">
            <div class="input-group mb-3">
                <label for="selectInvoice" class="form-label w-25 d-none d-sm-block">Sélectionner une facture*</label>
                <select name="selectInvoice" id="selectInvoice" class="form-select rounded">
                    <optgroup label="Sélectionnez une facture">
                        <?php echo selectInvoices(); ?>
                    </optgroup>
                </select>
            </div>
            <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
        </form>

    <?php else: ?>

        <h1 class="mb-5 text-center">Détails de la facture N°<?= $_GET['id']; ?></h1>
        
        <p class="fs-3"><span class="fw-bold">Numéro de Facture :</span> <?= $details['idInvoice']; ?></p>
        <p class="fs-3"><span class="fw-bold">Client :</span> <?= $details['lastname'].' '.$details['firstname']; ?></p>
        <p class="fs-3"><span class="fw-bold">Date :</span> <?= date('d/m/Y', strtotime($details['date'])); ?></p>

        <table class="table border">

            <thead class="text-center">
                <tr>
                    <th rowspan="2" class="border">Détails</th>
                    <th colspan="2" class="border">Montant</th>
                    <th rowspan="2" class="border">Montant<br>Total</th>
                </tr>
                <tr>
                    <th class="border">Coût unitaire</th>
                    <th class="border">Quantité</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="3" class="border"></td>
                    <td class="border fw-bold text-center"><?= number_format($montantTotal, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="border"></td>
                    <td class="border fw-bold text-center">Acompte</td>
                    <td class="text-center"><?= number_format($details['advance'], 2); ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="border"></td>
                    <td class="border fw-bold text-center">Reste à payer</td>
                    <td class="text-center fw-bold"><?= number_format($reste, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="border"></td>
                    <td class="border fw-bold text-center">Ristourne</td>
                    <td class="text-center"><?= number_format($percentRistourne, 2).' %'; ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="border"></td>
                    <td class="border fw-bold text-center">Montant Ristourne</td>
                    <td class="text-center"><?= number_format($ristourne, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="border"></td>
                    <td class="border fw-bold text-center">Net à payer</td>
                    <td class="fw-bold fs-3 text-center"><?= number_format($net, 2); ?></td>
                </tr>
            </tfoot>

            <tbody>
                <tr>
                    <td class="fw-bold">Chambres</td>
                    <td class="border text-center"><?= number_format($details['price'], 2); ?></td>
                    <td class="border text-center">2</td>
                    <td class="border text-center"><?= number_format($details['sumRooms'], 2); ?></td>

                </tr>
                <tr>
                    <td class="fw-bold">Extras</td>
                    <td class="border text-center"></td>
                    <td class="border text-center"></td>
                    <td class="border text-center"><?= number_format($details['sumExtras'], 2); ?></td>
                    
                </tr>
                <tr>
                    <td class="fw-bold">Restaurant</td>
                    <td class="border text-center"></td>
                    <td class="border text-center"></td>
                    <td class="border text-center"><?= number_format($details['sumRestaurant'], 2); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="w-100">
            <div class="w-25 ms-auto d-flex align-items-center">
                <a href="index.php?page=administration&section=invoices&action=updateInvoice&id=<?php echo $_GET['id']; ?>" class="btn w-50"><img src="public/resources/images/gestion/modifier.png" alt="modifier facture" class="w-50"></a>
                <a href="index.php?page=administration&section=invoices&action=pdfInvoice&id=<?php echo $_GET['id']; ?>" class="btn w-50" target="_blank"><img src="public/resources/images/gestion/pdf.png" alt="éditer en pdf" class="w-50"></a>
            </div>
        </div>

    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');