<!-- Page title / Titre de la page -->
<?php $title = 'Mentions Légales'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container text-center p-5 my-5">

    <h1 class="text-center mb-5">Mentions Légales</h1>
   
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require_once('views/template.php');