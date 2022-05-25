<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Créer une réservation - Résumé'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<div class="container">

    <h1 class="text-center my-2">Résumé de la réservation N° <?= $numeroReservation; ?></h1>

    <p class="fs-3"><span class="fw-bold">Client : </span><?= $customer; ?></p>
    <p class="fs-3"><span class="fw-bold">Dates : </span><?= $dates; ?></p>
    <p class="fs-3"><span class="fw-bold">Chambres</span>
        <ul>
            <?php foreach($priceRooms as $priceRoom): ?>
            <li><?= '<span class="fs-4 fw-bold">'.$priceRoom['designation'].'</span> - Numéro '.$priceRoom['number'].', Prix : '.number_format($priceRoom['price'],2).' €';?> </li>            
            <?php endforeach; ?>
        </ul>
    </p>
    <p class="fs-3"><span class="fw-bold">Prix total des chambres : </span><?= number_format($price,2).' €'; ?></p>
    <p class="fs-3"><span class="fw-bold">Acompte à verser : </span><?= number_format($advance,2).' €'; ?></p>
    <p class="fs-3"><span class="fw-bold">Restant à payer : </span><?= number_format($reste,2).' €'; ?></p>
</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');