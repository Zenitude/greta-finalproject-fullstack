<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des factures'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Réservation</th>
            <th>Client</th>
            <th>Montant</th>
        </tr>
    </thead>
    <tbody>
        <?php ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');