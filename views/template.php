<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/styles/css/raw/main.css">
        <title><?= 'Le Montagnard | '.$title ?></title>
    </head>
    <body class="w-100 h-100">
        
        <div class="container-fluid">

            <?php require('widgets/navbar.php'); ?>

            <?= $content ?>

            <?php require('widgets/footer.php'); ?>

        </div>
        
        <script src="public/scripts/bootstrap.bundle.js"></script>
        <script src="public/scripts/global.js"></script>
    </body>
</html>