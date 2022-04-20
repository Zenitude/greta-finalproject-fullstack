<!-- Page title / Titre de la page -->
<?php 

    $title = 'Accueil'; 
?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

    <section id="head" class="w-100 position-relative">
        <img src="public/resources/images/header - top.png" class="img-fluid position-absolute top-10 left-0" alt="">
        <img src="public/resources/images/header - bottom.png" class="img-fluid position-absolute bottom-25 right-0" alt="">
    </section>

    <section id="hotel" class="container">
        <div id="presentation">
            <h2>Nôtre Hôtel</h2>
            <div  class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <div><img src="public/ressources/images/hotel - 1.jpg" class="w-50 h-100" alt=""></div>
                <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, blanditiis?</div>
                <div></div>
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, debitis?</div>
                <div></div>
                <div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, cupiditate.</div>
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
<?php require('views/template.php');?>