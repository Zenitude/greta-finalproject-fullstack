<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - Résumé'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container">
    <?php 
        echo $numeroReservation.'<br>';
        echo $customer.'<br>';
        echo $dates.'<br>';
        echo $price.' €<br>';
        echo $advance.' €<br>';
        echo $reste.' €<br>';
    ?>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');