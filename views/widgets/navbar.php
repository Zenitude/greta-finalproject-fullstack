<div id="navHeader" class="w-100 bg-beige" style="z-index:1000;">
    <nav class="w-100 bg-beige position-relative" >
        <ul class="nav w-100 d-flex flex-row align-items-center justify-content-center">
            <li class="nav-item <?php echo $activeHome; ?>"><a href="index.php?page=home#home" class="nav-link fw-bold text-darkness">Home</a></li>
            <li class="nav-item <?php echo $activeHotel; ?>"><a href="index.php?page=home#hotel" class="nav-link fw-bold text-darkness">Hôtel</a></li>
            <li class="nav-item <?php echo $activeRestaurant; ?>"><a href="index.php?page=home#restaurant" class="nav-link fw-bold text-darkness">Restaurant</a></li>
                <?php if($_SESSION['typeAdmin'] == 'adminPrincipal' || $_SESSION['typeAdmin'] == 'adminHotel'): ?>
                    <li class="nav-item"><a href="index.php?page=reservation&action" class="nav-link fw-bold text-darkness">Réservation Hôtel</a></li>
            <?php endif; ?>
        </ul>
        <div id="translate" class="position-absolute top-0 end-0 me-1 d-flex justify-content-between">
            <a id="tradeFr"><img src="public/resources/images/drapeau-francais.png" alt="Translate French - Traduire en français" class="img-fluid"></a>    
        </div>
    </nav>
</div>
