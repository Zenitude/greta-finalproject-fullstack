<!-- Page title / Titre de la page -->
<?php 
    /*  The title variable receives the last part of the title of the page tab to complete it on the template
        La variable title reçoit la dernière partie du titre de l'onglet de page pour le compléter sur la template */
    $title = 'Connexion'; 
?>

<?php 
    if(isset($_SESSION['userAdmin'])): 
    /*  If there is a session redirect to the management page
        Si il y a a une session rediriger vers la page de gestion */
    header('Location: index.php?page=administration&section=gestion');

    /*  Otherwise display the login form
        Sinon afficher le formulaire de connexion */
    else: 
?>

<!-- Start of content / Début du contenu -->
<?php 
    /*  ob_start will scan and store all content after it
        ob_start va scanner et stocker tout le contenu après lui */
    ob_start();  
?> 

<?php 
    /*  If when submitting the form both fields are empty display an error
        Si lors de la soumission du formulaire les deux champs sont vide afficher une erreur */
    if(isset($errorUser) && $errorUser != ''){ echo $errorUser; } 
?>

<div class="container w-100">
    <form id="formConnection" action="index.php?page=connexion&action=login" method="POST" class="w-50 mx-auto">
        
        <!-- Field Mail | Champ "Email" -->
        <div class="form-group mt-5 rounded-pill">
            <label for="mailConnection" class="w-100 text-center text-darkness fw-bold">Email</label>
            <input type="text" name="mailConnection" id="mailConnection" class="form-control rounded-pill border text-center">
            
        </div>
        <?php 
                /*  If when submitting the form the field is empty display an error
                    Si lors de la soumission du formulaire le champ est vide afficher une erreur */
                if(isset($errorIdentify) && $errorIdentify != ''){ echo $errorIdentify; } 
            ?>
        

        <!-- Field Password | Champ "Mot de passe" -->
        <div class="form-group mt-5">
            <label for="passwordConnection" class="w-100 text-center text-darkness fw-bold">Mot de passe</label>
            <input type="password" name="passwordConnection" id="passwordConnection" class="form-control rounded-pill border text-center">
            
        </div>
        <?php 
                /*  If when submitting the form the field is empty display an error
                    Si lors de la soumission du formulaire le champ est vide afficher une erreur */
                if(isset($errorPassword) && $errorPassword != ''){ echo $errorPassword; } 
            ?>
        
        <button class="btn bg-beige border w-100 my-5 rounded-pill text-darkness fw-bold">Se connecter</button>

    </form>

</div>

<?php 
    /* ob_get_clean will unload all content stored by ob_start in the content variable that will display the content on the template at the location of the variable
       ob_get_clean va décharger tout le contenu stocké par ob_start dans la variable content qui affichera le contenu sur la template à l'emplacement de la variable */
    $content = ob_get_clean(); 
?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php 
    require('views/template.php');
    endif; 
?>
