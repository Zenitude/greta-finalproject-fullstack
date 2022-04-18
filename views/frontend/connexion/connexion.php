<!-- Page title / Titre de la page -->
<?php $title = 'Connexion'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<?php 

    if(isset($_GET['err']))
    {
        switch($_GET['err'])
        {
            case 'both':
                $errorIdentify = '<span class="text-danger ps-3"> Le champ Mail est vide ! </span>';
                $errorPassword = '<span class="text-danger ps-3"> Le champ Mot de passe est vide ! </span>';
                break;
            case 'mail':
                $errorIdentify = '<span class="text-danger ps-3"> Le champ Mail est vide !</span>';
                break;
            case 'password':
                $errorPassword = '<span class="text-danger ps-3"> Le champ Mot de passe est vide ! </span>';
                break;
            case 'wrongmail':
                $errorIdentify = '<span class="text-danger ps-3"> Email invalide !</span>';
                break;
            case 'wronguser':
                $errorUser = '<p class="bg-warning text-light text-center"> Utilisateur introuvable ! </p>';
                break;
            default :
                $errorIdentify = '';
                $errorPassword = '';
                $errorUser = '';
        }
    }
?>

<?php if(isset($errorUser) && $errorUser != ''){ echo $errorUser; } ?>

<div class="container w-100">

    <form id="formConnection" action="index.php?page=connexion&action=login" method="post" class="w-50 mx-auto">
        
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
<?php require('views/template.php');