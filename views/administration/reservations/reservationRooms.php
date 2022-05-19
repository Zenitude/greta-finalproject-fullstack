<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - Sélection Chambre(s)'; ?>

<!-- Start of content / Début du contenu -->
<?php 
    ob_start(); 
?>

<div class="container py-5">

<h1 class="text-center">Chambres disponibles</h1>

<table class="table">
    <thead class="text-center">
        <th>Numéro</th>
        <th>Désignation</th>
        <th>Lits</th>
        <th>Salle(s) de bain</th>
        <th>Toilette(s)</th>
        <th>Chambre(s) d'enfant</th>
        <th>Sallon(s)</th>
        <th>Terraces</th>
        <th>Prix</th>
    </thead>
    <tbody class="text-center">
        <?php foreach($rooms as $room): ?>
            <?php if($room['number'] != $_SESSION['verifDispoRooms']['number']): ?>
                <!-- suite ici -->
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');