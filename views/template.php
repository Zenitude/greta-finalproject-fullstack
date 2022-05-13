<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/styles/css/raw/main.css">
        <title><?= 'Le Montagnard | '.$title ?></title>
    </head>
    <body id="google_translate_element" class="bodySize w-100 h-100 bg-whiteness">
        
        <div class="container-fluid bodySize m-0 p-0 bg-white">

            <?php require('views/widgets/navbar.php'); ?>

            <?= $content ?>

            <?php require('views/widgets/footer.php'); ?>

        </div>
        
        <script src="public/scripts/fontawesome.js" type="text/javascript"></script>
        <script src="public/scripts/gsap.min.js" type="text/javascript"></script>
        <script src="public/scripts/scrolltrigger.min.js" type="text/javascript"></script>
        <script src="public/scripts/translate.js" type="text/javascript"></script> 
        <script>            
            tradeFr.addEventListener('click', (e) => 
            {
                e.preventDefault();
                new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element'); 
            });
            </script>
        <script src="public/scripts/bootstrap.bundle.js" type="text/javascript"></script>
        <script src="public/scripts/global.js" type="text/javascript"></script>
    </body>
</html>