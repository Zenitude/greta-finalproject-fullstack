
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
                    <li><a href="index.php?page=home">Accueil</a></li>

                    <?php if(isset($_SESSION['userAdmin'])): ?>
                        <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="index.php?page=connexion&action=login">Connexion Admin</a></li>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['userAdmin'])): ?>
                        <li><a href="index.php?page=administration&section=gestion">Gestion</a></li>
                        
                        <ul>
                            <li><a href="index.php?page=administration&section=customers&action=listCustomers">Liste des clients</a></li>
                            <?php if($_SESSION['typeAdmin'] == 'adminPrincipal' || $_SESSION['typeAdmin'] == 'adminHotel'): ?>
                            <ul>
                                <li><a href="index.php?page=administration&section=customers&action=createCustomer">Créer un client</a></li>
                                <li><a href="index.php?page=administration&section=customers&action=updateCustomer">Modifier un client</a></li>
                                <li><a href="index.php?page=administration&section=customers&action=deleteCustomer">Supprimer un client</a></li>
                            </ul>
                            <li><a href="index.php?page=administration&section=reservations&action=listReservations">Liste des réservations</a></li>
                            <ul>
                                <li><a href="index.php?page=administration&section=reservations&action=createReservation">Créer une réservation</a></li>
                                <li><a href="index.php?page=administration&section=reservations&action=updateReservation">Modifier une réservation</a></li>
                                <li><a href="index.php?page=administration&section=reservations&action=deleteReservation">Supprimer une réservation</a></li>
                                <?php if($_SESSION['typeAdmin'] == 'adminPrincipal' || $_SESSION['typeAdmin'] == 'adminRestaurant'): ?>
                                    <li><a href="">Réserver une table</a></li>
                                    <li><a href="">Menus</a></li>
                                <?php endif; ?>
                            </ul>
                            <li><a href="index.php?page=administration&section=reservations&action=listInvoices">Liste des factures</a></li>
                            <ul>
                                <li><a href="index.php?page=administration&section=invoices&action=detailsInvoice">Afficher une facture</a></li>
                                <li><a href="index.php?page=administration&section=invoices&action=updateInvoice">Modifier une facture</a></li>
                            </ul>
                        </ul>
                        <?php endif; ?>
                       
                                
                    </ul>
                    </ul>
                    <?php endif; ?>
                    <ul>
                        <li><a href="index.php?page=legalNotices">Mentions légales</a></li>
                    </ul>
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