<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Facturation'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');