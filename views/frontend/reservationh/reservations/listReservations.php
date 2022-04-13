<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des réservations'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Client</th>
            <th>Dates</th>
            <th>Montant</th>
            <th>Reste à payer</th>
        </tr>
    </thead>
    <tbody>
        <?php ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('template.php');