<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - Sélection des Dates'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container py-5">
    <h1 class="text-center">Vérifier disponibilité des chambres</h1>

    <form method="POST" action="index.php?page=administration&section=reservations&action=createReservation&option=selectRooms" class="my-4 d-flex justify-content-center align-items-center">
        <div class="form-inline w-25">
            <label for="dateStartReservation">Date de début</label>
            <input type="date" id="dateStartReservation" name="dateStartReservation" class="form-control">
        </div>
        <div class="form-inline mx-3 w-25">
            <label for="dateEndReservation">Date de début</label>
            <input type="date" id="dateEndReservation" name="dateEndReservation" class="form-control">
        </div>
        <button class="btn bg-beige border align-self-end">Vérifier</button>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');