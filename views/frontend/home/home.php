<!-- Page title / Titre de la page -->
<?php $title = 'Accueil'; ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

    <section id="head">
        <img src="" alt="">
    </section>

    <section id="hotel" class="container">
        <div id="presentation">
            <h2>Nôtre Hôtel</h2>
            <div  class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <div><p>Hello</p></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div id="activities" >
            <h2>Activités</h2>
            <div class="row row-cols-1 row-cols-md-2 g-3">
                <div></div>
                <div></div>
            </div>
        </div>
    </section>

    <section id="restaurant">
        <div id="chefs">
        <h2>Nôtre Restaurant</h2>
            <div  class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div id="carousel">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php'); ?>