<!DOCTYPE html>
<html lang="fr">
    <head>

        <!-- Encoding meta tag | Balise meta d'encodage -->
        <meta charset="UTF-8">

        <!-- Meta tag to display content in the highest available mode for Internet Explorer | Balise meta pour afficher le contenu dans le mode le plus élevé disponible pour Internet Explorer -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Meta tag to control the layout on mobile | Balise meta pour contrôler la mise en page sur mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Importing Custom Style | Importation du style personnalisé -->
        <link rel="stylesheet" href="public/styles/css/raw/main.css">

        <!-- Icône de l'onglet -->
        <link rel="icon" href="public/resources/images/home/favicon.ico" />

        <!-- Displaying the title in the page tab | Affichage du titre dans l'onglet de la page -->
        <title><?= 'Le Montagnard | '.$title ?></title>
    </head>
    <body id="google_translate_element" class="bodySize w-100 h-100 bg-whiteness">
        
        <div class="container-fluid bodySize m-0 p-0 bg-white">

            <!-- Importing the navigation bar | Importation de la barre de navigation -->
            <?php require('views/widgets/navbar.php'); ?> 

            <!-- Display the content | Affichage du contenu -->
            <?= $content; ?>

            <!-- Importing the footer | Importation du pied de page -->
            <?php require('views/widgets/footer.php'); ?>

        </div>
        
        <!-- Importing the script for the fontawesome icons | Importation du script pour les icônes de fontawesome -->
        <script src="public/scripts/fontawesome/fontawesome.js" type="text/javascript"></script>

        <!-- Importing the scripts for using the Greensock library | Importation des scripts pour l'utilisation de la bibliothèque Greensock -->
        <?php if($title == 'Accueil'): ?>
            <script src="public/scripts/greensock/gsap.min.js" type="text/javascript"></script>
            <script src="public/scripts/greensock/scrolltrigger.min.js" type="text/javascript"></script>
            <script src="public/scripts/greensock/greensock.js" type="text/javascript"></script>
        <?php endif; ?>

        <!-- Importing the script from google translate for machine translation | Importation du script de google translate pour la traduction automatique -->
        <script src="public/scripts/translate/translate.js" type="text/javascript"></script> 

        <!-- Using a click event on the globe for machine translation | Utilisation d'un événement au click sur le globe pour la traduction automatique -->
        <script>
            const tradeFr = document.querySelector('#tradeFr');
            tradeFr.addEventListener('click', (e) => 
            {
                e.preventDefault();
                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element'); 
            });
        </script>

        <!-- Importating the script for bootstrap 5 | Importation du script pour bootstrap 5 -->
        <script src="public/scripts/bootstrap/bootstrap.bundle.js" type="text/javascript"></script>

         <!-- Importing the custom script | Importation du script personnalisé -->
         <script src="public/scripts/global.js" type="text/javascript"></script>

       
    </body>
</html>
