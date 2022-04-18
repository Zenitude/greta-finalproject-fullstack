<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Liste des clients'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Nombre de réservations</th>
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