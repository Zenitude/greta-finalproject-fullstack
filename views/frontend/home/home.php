<!-- Page title / Titre de la page -->
<?php 

    $title = 'Accueil'; 
?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

    <section id="head" class="w-100 position-relative">
        <img src="public/resources/images/home/head/hotel.jpg" class="img-fluid position-absolute bottom-0 right-0" alt="">
        <img src="public/resources/images/home/head/header - bottom.png" class="img-fluid position-absolute bottom-0 right-0" alt="">
    </section>

    <section id="hotel" class="container">
        <div id="presentation">
            <h2 class="text-center">Nôtre Hôtel</h2>
            <div  class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <div><img src="public/resources/images/home/head/hotel.jpg" class="w-50 h-100" alt=""></div>
                <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, blanditiis?</div>
                <div></div>
                <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, debitis?</div>
                <div></div>
                <div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod, cupiditate.</div>
            </div>
        </div>
        <div id="activities" >
            <h2 class="text-center">Activités</h2>
            <div class="row row-cols-1 row-cols-md-2 g-3">
                <div></div>
                <div></div>
            </div>
        </div>
    </section>

    <section id="restaurant">
        <div id="chefs" class="bg-beige">
        <h2 class="text-center">Nôtre Restaurant</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div id="carouselHome" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="4000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="public/resources/images/home/carousel/fondue.jpg" class="d-block w-100 h-100" alt="Fondue savoyarde">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fondue savoyarde</h5>
                        <p>Préparé par notre chef spécialisé dans les repas savoyards avec des produits fabriqués localement.</p>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <img src="public/resources/images/home/carousel/raclette.jpg" class="d-block w-100 h-100" alt="Raclette traditionnelle">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Raclette traditionnelle</h5>
                        <p>Préparé par notre chef spécialisé dans les repas savoyards avec des produits fabriqués localement.</p>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <img src="public/resources/images/home/carousel/tartiflette.png" class="d-block w-100 h-100" alt="Tartiflette artisanale">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tartiflette artisanale</h5>
                        <p>Préparé par notre chef spécialisé dans les repas savoyards avec des produits fabriqués localement.</p>
                    </div>
                </div>
            </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </section>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php require('views/template.php');?>