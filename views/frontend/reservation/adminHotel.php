<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Administration'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<form action="" method="post">
    <div>
        <label for="identify">Identifiant</label>
        <input type="text" name="identify" id="identify">
    </div>
    <div>
        <label for="password">Email</label>
        <input type="password" name="password" id="password">
    </div>
    <button class="btn btn-beige">Se connecter</button>
</form>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('template.php');