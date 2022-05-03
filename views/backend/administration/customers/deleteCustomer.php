<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Ajouter un conjoint'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); if(isset($_GET['id'])){ $id = $_GET['id'];} ?>

<div class="container text-center p-5 my-5">

    <h1 class="mb-5">Supprimer le client <?= $id; ?></h1>
    <a href="index.php?page=administration&section=customers&action=listCustomers" class="btn btn-lg bg-beige border me-5">Annuler</a> 
    <a href="index.php?page=administration&section=customers&action=listCustomers&delete=confirmed&id=<?= $id; ?>" class="btn btn-lg btn-danger border text-light">Confirmer</a>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');