<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Information facture'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">

    <!-- If the parameter 'id' does not exist, we display the form to select an invoice 
         Si le paramètre 'id' n'existe pas, on affiche le formulaire pour sélectionner une facture -->
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

    <!-- Otherwise, if the parameter 'id' exists, the corresponding invoice is displayed
         Sinon, si le paramètre 'id' existe, on affiche la facture correspondante -->
    <?php else: ?>

        <h1 class="mb-5 text-center">Détails de la facture N°<?= $_GET['id']; ?></h1>
        
        <!-- Invoice Information | Informations sur la facture -->
        <p class="fs-3"><span class="fw-bold">Numéro de Facture :</span> <?= $details['idInvoice']; ?></p>
        <p class="fs-3"><span class="fw-bold">Date Facture :</span> <?= date('d/m/Y', strtotime($details['date'])); ?></p>

        <!-- Customer Information | Informations sur le client -->
        <p class="fs-3"><span class="fw-bold">Client :</span> <?= $details['lastname'].' '.$details['firstname']; ?></p>
        
        <!-- Reservation Information | Informations sur la réservation -->
        <p class="fs-3"><span class="fw-bold">
            Réservation :</span> <?= 'N° '
                .$details['idReservationI']
                .' du '.date('d/m/Y', strtotime($details['startDate'])).' au '.date('d/m/Y', strtotime($details['endDate'])); ?>
        </p>

        <table class="table border">

            <!-- Table header | En-tête du tableau -->
            <thead class="text-center">
                <tr>
                    <th rowspan="2" class="border fs-5">Détails</th>
                    <th colspan="2" class="border fs-5">Montant</th>
                    <th rowspan="2" class="border fs-5">Montant<br>Total</th>
                </tr>
                <tr>
                    <th class="border fs-5">Coût unitaire</th>
                    <th class="border fs-5">Quantité</th>
                </tr>
            </thead>

            <!-- Table Footer | Pied du tableau -->
            <tfoot>
                <!-- Total Rooms, Extras and Restaurant | Total Chambres, Extras et Restaurant -->
                <tr>
                    <td colspan="3" class="border"></td>
                    <td class="border fw-bold text-center fs-5"><?= number_format($montantTotal,2,',',' '); ?></td>
                </tr>

                <!-- Percentage of rebate granted | Pourcentage de ristourne accordée -->
                <tr>
                    <td colspan="2" class="border"></td>
                    <td class="border fw-bold text-center fs-5">Ristourne accordée</td>
                    <td class="text-center fs-5"><?= number_format($percentRistourne,2,',',' ').' %'; ?></td>
                </tr>

                <!-- Amount of the rebate granted | Montant de la ristourne accordée -->
                <tr>
                    <td colspan="2" class="border fs-6 fst-italic text-center">(Ristourne basé sur le montant total des chambres, hors extras et restauant)</td>
                    <td class="border fw-bold text-center fs-5">Ristourne</td>
                    <td class="text-center fs-5"><?= number_format($ristourne,2,',',' '); ?></td>
                </tr>

                <!-- Amount of advance paid | Montant de l'acompte versé -->
                <tr>
                    <td colspan="2" class="border fs-6 fst-italic text-center">(Acompte basé sur le montant total des chambres, hors extras et restauant)</td>
                    <td class="border fw-bold text-center fs-5">Acompte</td>
                    <td class="text-center fs-5"><?= number_format($details['advance'],2,',',' '); ?></td>
                </tr>

                <!-- Amount outstanding | Montant restant à payer -->
                <tr>
                    <td colspan="2" class="border"></td>
                    <td class="border fw-bold text-center fs-5">Net à payer</td>
                    <td class="fw-bold fs-3 text-center fs-5"><?= number_format($net,2,',',' '); ?></td>
                </tr>
            </tfoot>

            <!-- Table Body | Corps du tableau -->
            <tbody>

                <!-- Room details | Détails des chambres -->
                <tr>
                    <td class="fw-bold fs-5">Chambres</td>
                    <td class="border text-center"></td>
                    <td class="border text-center fs-5"><?= count($roomsBooked); ?></td>
                    <td class="border text-center fs-5"><?= number_format($details['sumRooms'],2,',',' '); ?></td>

                </tr>

                <!-- List of rooms allocated | Liste des chambres attribuées -->
                <tr>
                    <td class="border">
                        <ul>
                            <?php foreach($roomsBooked as $roomBooked): ?>
                                <li class="fs-6"><?= '<span class="fw-bold">'.$roomBooked['designation'].'</span> ('.$roomBooked['number'].')'; ?></li>    
                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <td class="border text-center">
                        <dl>
                            <?php foreach($roomsBooked as $roomBooked): ?>
                                <dd class="fs-6"><?= number_format($roomBooked['price'],2,',',' '); ?></dd>
                            <?php endforeach; ?>
                        </dl>
                    </td>
                    <td class="border"></td>
                    <td class="border"></td>
                </tr>

                <!-- Details of the extras | Détails des extras -->
                <tr>
                    <td class="fw-bold fs-5">Extras</td>
                    <td class="border text-center"></td>
                    <td class="border text-center"></td>
                    <td class="border text-center fs-5"><?= number_format($details['sumExtras'],2,',',' '); ?></td>
                    
                </tr>

                <!-- Restaurant Details | Détails du restaurant -->
                <tr>
                    <td class="fw-bold fs-5">Restaurant</td>
                    <td class="border text-center"></td>
                    <td class="border text-center"></td>
                    <td class="border text-center fs-5"><?= number_format($details['sumRestaurant'],2,',',' '); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="w-100">
            <div class="w-25 ms-auto d-flex align-items-center">

                <!-- button to modify | Bouton pour modifier -->
                <a href="index.php?page=administration&section=invoices&action=updateInvoice&id=<?php echo $_GET['id']; ?>" class="btn w-50 fw-bold">
                    <img src="public/resources/images/gestion/modifier.png" alt="modifier facture" class="w-50">
                    <br>Modifier
                </a>
            </div>
        </div>

    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');

