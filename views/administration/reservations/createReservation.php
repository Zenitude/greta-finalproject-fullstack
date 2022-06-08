<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - '.$titleSup; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">

    <!-- If a Client has been selected display the date selection | Si un Client a été selectionné afficher la sélection des dates -->
    <?php if(isset($_POST['selectReservationCustomer'])): ?>

        <?php $titleSup = 'Sélection des dates'; // Complete Page Tab Title | Compléter le titre d'onglet de page ?>

        <h1 class="text-center">Vérifier disponibilité des chambres</h1>
        <form method="POST" action="index.php?page=administration&section=reservations&action=createReservation" class="my-4 d-flex justify-content-center align-items-center">
           
            <!-- Start Date | Date de début -->
            <div class="form-inline w-25">
                <label for="dateStartReservation">Date de début</label>
                <input type="date" id="dateStartReservation" name="dateStartReservation" class="form-control">
            </div>

            <!-- End Date | Date de fin -->
            <div class="form-inline mx-3 w-25">
                <label for="dateEndReservation">Date de début</label>
                <input type="date" id="dateEndReservation" name="dateEndReservation" class="form-control">
            </div>

            <!-- Invisible field retrieving client ID | Champ invisible récupérant l'id du client -->
            <input type="text" class="d-none" name="idCustomer" value="<?= $_POST['selectReservationCustomer']; ?>">

            <!-- Send form button | Bouton d'envoie de formulaire -->
            <button class="btn bg-beige border align-self-end">Vérifier</button>
        </form>

    <!-- If a start date and end date have been selected display the selection of available rooms | Si une date de début et une date de fin ont été choisie afficher la sélection des chambres disponibles  -->
    <?php elseif(isset($_POST['dateStartReservation']) && isset($_POST['dateEndReservation'])): ?>

        <?php $titleSup = 'Sélection de(s) chambre(s)'; // Complete Page Tab Title | Compléter le titre d'onglet de page ?>

        <h1 class="text-center">Chambres disponibles pour la période</h1>

        <!-- Display dates of selected period | Afficher les dates de la période choisie -->
        <p class="text-center fs-2"><?php echo 'du '.date('d/m/Y', strtotime($_POST['dateStartReservation'])).' au '.date('d/m/Y', strtotime($_POST['dateEndReservation'])); ?></p>

        <form action="index.php?page=administration&section=reservations&action=createReservation&option=finishReservation" method="POST">

            <table class="table">

                <!-- Header table | En-tête du tableau -->
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

                <!-- Body table | Corps du tableau -->
                <tbody class="text-center">

                    <!-- If rooms have been found for the chosen period | Si des chambres ont été trouvé pour la période choisie -->
                    <?php if($roomsDispo): ?>

                        <!-- Show details for each room with a checkbox to select it | Afficher les détails pour chaque chambres avec un checkbox pour la sélectionner -->
                        <?php foreach($roomsDispo as $roomDispo): ?>
                            <tr>
                                <td><input type="checkbox" name="<?= str_replace(' ', '_', $roomDispo['designation']) ; ?>" value="<?= $roomDispo['idRoom']; ?>"></td>
                                <td><?= $roomDispo['number']; ?></td>
                                <td><?= $roomDispo['designation']; ?></td>
                                <td><?= $roomDispo['beds']; ?></td>
                                <td><?= $roomDispo['bathrooms']; ?></td>
                                <td><?= $roomDispo['toiletes']; ?></td>
                                <td><?= $roomDispo['childrooms']; ?></td>
                                <td><?= $roomDispo['sallons']; ?></td>
                                <td><?= $roomDispo['terraces']; ?></td>
                                <td><?= number_format($roomDispo['price'], 2).' €'; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    <!-- If no room is available display a message | Si aucune chambre n'est disponible afficher un message -->
                    <?php else: ?>
                        <tr>
                            <td colspan="10">Aucune chambres disponible</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- If rooms have been found for the chosen period | Si des chambres ont été trouvé pour la période choisie -->
            <?php if($roomsDispo): ?>
                <input type="text" class="d-none" name="idCustomer" value="<?= $_POST['idCustomer']; ?>">
                <input type="date" class="d-none" name="dateStart" value="<?= $_POST['dateStartReservation']; ?>">
                <input type="date" class="d-none" name="dateEnd" value="<?=  $_POST['dateEndReservation']; ?>">
           
                <button class="btn bg-beige border">Choisir</button>
            
            <!-- If no room is available | Si aucune chambre n'est disponible -->
            <?php else: ?>
                <a href="index.php?page=administration&section=reservations&action=createReservation" class="btn bg-beige border">Retour</a>
                
            <?php endif; ?>
        
        </form>

    <!-- If no client was selected, or no date was selected display the client selection | Si aucun client n'a été sélectionné, ou aucune date n'a été choisie afficher la sélection du client -->
    <?php else: ?>

        <?php $titleSup = 'Sélection du client'; // Complete Page Tab Title | Compléter le titre d'onglet de page ?>

        <h1 class="text-center">Sélectionner un client pour la réservation</h1>

        <form action="index.php?page=administration&section=reservations&action=createReservation" method="POST" class="my-4 d-flex flex-column">
            
            <!-- Select to select the client | Select pour choisir le client -->
            <div class="input-group mb-3">
                <label for="selectReservationCustomer" class="form-label w-25 d-none d-sm-block">Sélectionner un client*</label>
                <select name="selectReservationCustomer" id="selectReservationCustomer" class="form-select rounded">
                    <optgroup label="Sélectionnez un client"></optgroup>
                    <?php selectCustomers(); ?>
                </select>
            </div>

            <!-- Send form button | Bouton d'envoie de formulaire -->
            <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
        </form>
        
    <?php endif; ?>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php'); ?>
