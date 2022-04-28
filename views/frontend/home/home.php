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

    <section id="hotel">
        <div id="presentation" class="pt-5 bg-beige">
            <div class="container">
                <h2 class="text-center display-5 fw-bold">Nôtre Hôtel</h2>
                <div  class="row row-cols-1 row-cols-md-2 g-3">
                    <div><img src="public/resources/images/home/head/hotel.jpg" class="w-75 h-75 img-fluid" alt="vue hotel externe"></div>
                    <div class="p-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate necessitatibus deserunt nulla libero laudantium, dicta, voluptatem amet ad impedit recusandae quidem expedita. Ullam tenetur eveniet doloribus eos asperiores voluptates expedita dolorum similique ad architecto, fugit voluptate libero temporibus, consequatur nam. Delectus cum quisquam expedita quo rem. Consequuntur enim tempora magnam.</div>
                    <div class="p-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi soluta perspiciatis, fugiat nobis dolor, odio corporis minus cum obcaecati repellendus quis possimus illo facilis impedit vel consequuntur necessitatibus consectetur esse ad quisquam excepturi dignissimos saepe cumque atque! Nostrum quidem quaerat fugiat placeat tempora aspernatur eius officia reprehenderit expedita dicta. Doloremque!</div>
                    <div><img src="public/resources/images/home/hotel/vue-montagne.jpg" class="w-75 h-75 img-fluid" alt="chambre luxe"></div>
                    <div><img src="public/resources/images/home/hotel/restaurant-vue.jpg" class="w-75 h-75 img-fluid" alt="vue restaurant"></div>
                    <div class="p-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime, tempore, aspernatur laborum nihil accusantium voluptatibus vero non pariatur inventore ut quis incidunt maiores. Pariatur et adipisci minus obcaecati velit suscipit quidem quam maxime, tempore eligendi soluta, asperiores consequuntur nemo fuga ad. Accusantium commodi ipsa nesciunt eligendi fugiat ea fugit expedita.</div>
                </div>
            </div>
        </div>
        <div id="activities" class="pt-4 container">
            <h2 class="text-center display-5 fw-bold">Activités</h2>
            <div class="row row-cols-1 row-cols-md-2 g-5 mt-1 mb-5">
                <div>
                    <div class="card">
                        <h4 class="text-center bg-beige">Internes</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Booling</li>
                            <li class="list-group-item">Piscine chauffée</li>
                            <li class="list-group-item">Billard</li>
                            <li class="list-group-item">Arcade</li>
                            <li class="list-group-item">Sauna</li>
                            <li class="list-group-item">Bain nordique</li>
                            <li class="list-group-item">etc...</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class="card">
                        <h4 class="text-center bg-beige">Externes</h4>
                        <ul class="list-group">
                            <li class="list-group-item">Ski</li>
                            <li class="list-group-item">Snowboard</li>
                            <li class="list-group-item">Handiski</li>
                            <li class="list-group-item">Téléphérique</li>
                            <li class="list-group-item">Randonné</li>
                            <li class="list-group-item">Ascension</li>
                            <li class="list-group-item">etc...</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="restaurant">
        <div id="chefs" class="bg-beige pt-4">
        <h2 class="text-center display-5 fw-bold">Nôtre Restaurant</h2>
        <div class="container py-5">
                <div class="row row-cols-1 row-cols-lg-3 g-3">
                    <div class="order-3 order-lg-1">
                        <div class="card">
                            <img src="public/resources/images/home/restaurant/chefSavoyard.jpg" alt="le chef savoyard">
                            <div class="p-3 p-lg-5">
                                <h4 class="mb-4">Chef Savoyard</h4>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus recusandae inventore non ipsum ullam at dolorem harum accusamus nisi! Doloribus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="order-2 order-lg-2">
                        <div class="card">
                            <img src="public/resources/images/home/restaurant/chefGastronomique.jpg" alt="le chef gastronomique">
                            <div class="p-3 p-lg-5">
                                <h4 class="mb-4">Chef Gastronomique</h4>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus dolorum distinctio, vel fuga eveniet vero vitae? Officiis molestiae explicabo dolorem!</p>
                            </div>
                        </div>
                    </div>
                    <div class="order-1 order-lg-3">
                        <div class="card">
                            <img src="public/resources/images/home/restaurant/chefPatissier.png" alt="le chef patissier">
                            <div class="p-3 p-lg-5">
                                <h4 class="mb-4">Chef pâtissier</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa nam dolorum vero beatae accusantium debitis modi, ut incidunt tempore? Suscipit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselHome" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="4000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="4" aria-label="Slide 5"></button>
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
                <div class="carousel-item h-100">
                    <img src="public/resources/images/home/carousel/petit-dejeuner.jpg" class="d-block w-100 h-100" alt="Petit déjeuner">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Petit déjeuner</h5>
                        <p>Préparé par notre chef patissier avec des produits fabriqués localement.</p>
                    </div>
                </div>
                <div class="carousel-item h-100">
                    <img src="public/resources/images/home/carousel/repas-gastro.jpg" class="d-block w-100 h-100" alt="Repas gastronomique">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Repas gastronomique</h5>
                        <p>Préparé par notre chef gastronomique avec des produits fabriqués localement.</p>
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