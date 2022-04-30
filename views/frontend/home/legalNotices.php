<!-- Page title / Titre de la page -->
<?php $title = 'Mentions Légales'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<h1>Mentions légales</h1>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');