<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des clients'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container txt-center py-5">

    <table class="table table-hover table-striped">

        <thead class="table-warning">
            <tr>
                <th class="text-center">Numéro</th>
                <th class="text-center">Nom</th>
                <th class="text-center">Prénom</th>
                <th class="text-center">Adresse</th>
                <th class="text-center">Code Postal</th>
                <th class="text-center">Ville</th>
                <th class="text-center">Nombre de réservations</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($customers as $customer): ?>

                <?php 
                    $numberReservations = $listCustomers->numberReservation($customer['id']);
                    $numberReservations->execute();
                    $reservations = $numberReservations->fetchAll();
                    $countReservations = count($reservations);
                ?>
                
                <tr class="h-50">
                    <td class="text-center"><?= $customer['id']; ?></td>
                    <td class="text-center"><?= $customer['lastname']; ?></td>
                    <td class="text-center"><?= $customer['firstname']; ?></td>
                    <td class="text-center"><?= $customer['street']; ?></td>
                    <td class="text-center"><?= $customer['zipCode'] ?></td>
                    <td class="text-center"><?= $customer['city'] ?></td>
                    <td class="text-center"><?= $countReservations; ?></td>
                    <td class="text-center" style="width:5%;"><a href="index.php?page=administration&section=customers&action=updateCustomer&id="<?php echo $customer['id']; ?>"><img src="public/resources/images/gestion/editer.png" alt="Modifier client" class="img-fluid"></a></td>
                    <td class="text-center" style="width:5%;"><a href="index.php?page=administration&section=customers&action=deleteCustomer&id="<?php echo $customer['id']; ?>"><img src="public/resources/images/gestion/supprimer-red.png" alt="Supprimer client" class="img-fluid"></a></td>
                <tr>
                    
            <?php endforeach; ?>
        </tbody>

    </table>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');