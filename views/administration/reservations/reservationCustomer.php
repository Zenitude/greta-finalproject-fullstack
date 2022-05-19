<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - Sélection du Client'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">
<h1 class="text-center">Sélectionner un client pour la réservation</h1>
<form action="index.php?page=administration&section=reservations&action=createReservation&option=selectDates" method="POST" class="my-4 d-flex flex-column">
        <div class="input-group mb-3">
            <label for="selectReservationCustomer" class="form-label w-25 d-none d-sm-block">Sélectionner un client*</label>
            <select name="selectReservationCustomer" id="selectReservationCustomer" class="form-select rounded">
                <optgroup label="Sélectionnez un client" selected>
                </optgroup>
                <?php selectCustomers(); ?>
            </select>
        </div>
        <button class="btn bg-beige fs-sm-4 mx-auto border w-50 h-50">Sélectionner</button>
</form>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');