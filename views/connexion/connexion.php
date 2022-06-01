<!-- Page title / Titre de la page -->
<?php $title = 'Connexion'; ?>

<?php if(isset($_SESSION['userAdmin'])): ?>
    
<?php 
    header('Location: index.php?page=administration&section=gestion');
    else: 
?>
<!-- Start of content / Début du contenu -->

<?php ob_start(); ?>

<?php if(isset($errorUser) && $errorUser != ''){ echo $errorUser; } ?>

<div class="container w-100">
    <?php if(isset($_SESSION['userAdmin'])){ echo $_SESSION['userAdmin'];} ?>
    <form id="formConnection" action="index.php?page=connexion&action=login" method="POST" class="w-50 mx-auto">
        
        <div class="form-floating mt-5 rounded-pill">
            <label for="mailConnection" class="input-group-text rounded-pill border bg-beige text-darkness fw-bold">Email</label>
            <input type="text" name="mailConnection" id="mailConnection" class="form-control rounded-pill border text-center">
        </div>
        <?php if(isset($errorIdentify) && $errorIdentify != ''){ echo $errorIdentify; } ?>

        <div class="form-floating mt-5">
            <label for="passwordConnection" class="input-group-text rounded-pill border bg-beige text-darkness fw-bold">Mot de passe</label>
            <input type="password" name="passwordConnection" id="passwordConnection" class="form-control rounded-pill border text-center">
        </div>
        <?php if(isset($errorPassword) && $errorPassword != ''){ echo $errorPassword; } ?>

        <button class="btn bg-beige border w-100 my-5 rounded-pill text-darkness fw-bold">Se connecter</button>

    </form>

</div>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php 
    require('views/template.php');
    endif; ?>
