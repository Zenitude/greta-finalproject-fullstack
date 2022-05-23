<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - Sélection Chambre(s)'; ?>

<!-- Start of content / Début du contenu -->
<?php 
    ob_start(); 
?>

<div class="container py-5">

<h1 class="text-center">Chambres disponibles pour la période</h1>
<p class="text-center fs-2"><?php echo 'du '.date('d/m/Y', strtotime($_COOKIE['reservation_dateStart'])).' au '.date('d/m/Y', strtotime($_COOKIE['reservation_dateEnd'])); ?></p>

<form action="index.php?page=administration&section=reservations&action=createReservation&option=finishReservation" method="POST">
    <table class="table">
        <thead class="text-center">
            <th></th>
            <th>Numéro</th>
            <th>Désignation</th>
            <th>Lits</th>
            <th>Salle(s) de bain</th>
            <th>Toilette(s)</th>
            <th>Chambre(s) d'enfant</th>
            <th>Sallon(s)</th>
            <th>Terraces</th>
            <th>Prix/Jour</th>
        </thead>
        <tbody class="text-center">
        <?php foreach($rooms as $room): ?>
	        <?php if($room['number'] != $verifDispo['number']): ?>
                <tr>
                    <td><input type="checkbox" name="<?= str_replace(' ', '_', $room['designation']) ; ?>" value="<?= $room['idRoom']; ?>"></td>
                    <td><?= $room['number']; ?></td>
                    <td><?= $room['designation']; ?></td>
                    <td><?= $room['beds']; ?></td>
                    <td><?= $room['bathrooms']; ?></td>
                    <td><?= $room['toiletes']; ?></td>
                    <td><?= $room['childrooms']; ?></td>
                    <td><?= $room['sallons']; ?></td>
                    <td><?= $room['terraces']; ?></td>
                    <td><?= number_format($room['price'], 2).' €'; ?></td>
                </tr>
	        <?php else: ?>
		        <p>Aucune chambre disponible</p>      
	        <?php endif; ?>	
        <?php endforeach; ?>
        </tbody>
    </table>
    <button class="btn bg-beige border">Choisir</button>
</form>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');