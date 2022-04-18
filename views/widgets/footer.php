
<footer class="w-100 bg-beige p-5">

    <div class="row row-cols-1 row-cols-lg-4 text">

        <div id="contact" class="d-flex flex-column">
            
            <h3 class="text-uppercase mb-4">Contact</h3>
                        
            <address class="d-flex flex-column">
                
                <span><i class="fa-solid fa-location-dot"></i> Le Montagnard</span>
                
                <span>996 Route des Granges</span>
                               
                <span>74310 Les Houches</span>
                
            </address>
            
            <p class="mb-0"><i class="fa-solid fa-phone"></i> 09.00.00.00.00</p>
            
            <a href="mailto:lemontagnard@gmail.com" class="text-darkness text-decoration-none"><i class="fa-solid fa-envelope"></i> lemontagnard@gmail.com</a>

            <h3 class="text-uppercase my-4 fs-4">Où sommes-nous ?</h3>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10247.988437430202!2d3.11838305!3d50.04888545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1650106996941!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-75 h-100"></iframe>
            </div>
            
        </div>

        <div id="planSite">
            <h3 class="text-uppercase mb-4">Plan du site</h3>
            <nav>
                <ul>
                    <li><a href="">Accueil</a></li>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">Hotel</a></li>
                        <li><a href="">Restaurant</a></li>
                    </ul>
                    <li><a href="index.php?page=connexion">Connexion Admin</a></li>
                    <?php if(isset($_SESSION['userAdmin'])): ?>
                        <?php if($_SESSION['typeAdmin'] == 'adminPrincipal' || $_SESSION['typeAdmin'] == 'adminHotel'): ?>
                            <ul>
                                <li><a href="">Réservation Hôtel</a></li>
                                <ul>
                                    <li><a href="">Créer un client</a></li>
                                    <ul>
                                        <li><a href="">Ajouter un conjoint</a></li>
                                        <li><a href="">Ajouter un enfant</a></li>
                                    </ul>
                                    <li><a href="">Créer une réservation</a></li>
                                    <li><a href="">Facturer</a></li>
                                    <li><a href="">Liste des clients</a></li>
                                    <li><a href="">Liste des commandes</a></li>
                                    <li><a href="">Liste des factures</a></li>
                                </ul>
                            </ul>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li><a href="">Mentions légales</a></li>
                </ul>
            </nav>
        </div>
        
        <div id="socialNetworks" class="d-flex flex-column">
            <h3 class="text-uppercase mb-4">Suivez-nous</h3>
            <a href="" class="text-darkness text-decoration-none"><i class="fa-brands fa-facebook-square fa-2x"></i><span> Facebook</span></a>
            <a href="" class="text-darkness text-decoration-none"><i class="fa-brands fa-instagram-square fa-2x"></i><span> Instagram</span></a>
            <a href="" class="text-darkness text-decoration-none"><i class="fa-brands fa-twitter-square fa-2x"></i><span> Twitter</span></a>
            <a href="" class="text-darkness text-decoration-none"><i class="fa-brands fa-pinterest-square fa-2x"></i><span> Pinterest</span></a>
            <a href="" class="text-darkness text-decoration-none"><i class="fa-brands fa-youtube-square fa-2x"></i><span> Youtube</span></a>
            <a href="" class="text-darkness text-decoration-none"><i class="fa-solid fa-square-rss fa-2x"></i><span> Flux Rss</span></a>
        </div>

        <div class="reservation">
            <h3 class="text-uppercase mb-4">Réservation</h3>
            <a href="mailto:lemontagnard@gmail.com" class="btn btn-light btn-lg rounded-pill fst-italic my-1 border text-darkness d-flex align-items-center justify-content-center">Réservez une chambre <i class="fa-solid fa-chevron-right ms-auto"></i></a>
            <a href="mailto:lemontagnard@gmail.com" class="btn btn-light btn-lg rounded-pill fst-italic my-1 border text-darkness d-flex align-items-center justify-content-center">Réservez une table <i class="fa-solid fa-chevron-right ms-auto"></i></a>
        </div>
            
    </div>

    <div id="copright" class="row row-cols-12"></div>

</footer>