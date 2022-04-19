<!-- Page title / Titre de la page -->
<?php 
    session_start();
    $title = 'Réservation Hôtel | Administration'; 
?>

<?php 
    if(isset($_SESSION['userAdmin'])):
?>
<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<h1>Vous êtes connecté !</h1>

<a href="<?php session_destroy(); header('Location: index.php?page=home');?>">Détruire session</a>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php 
    require('views/template.php');
    else: header('Location: index.php?page=connexion');
    endif;
    