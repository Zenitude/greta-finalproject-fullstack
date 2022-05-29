<div id="navHeader" class="w-100 bg-beige" style="z-index:1000;">
    <nav class="w-100 bg-beige position- navbar navbar-expand-lg" >
        <div class="container-fluid">
            <a href="index.php?page=home" class="navbar-brand">Le Montagnard</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Afficher/Masquer menu">
                <span class="navbar-toggler-icon text-black"></span>
            </button>
            <div id="navMain" class="collapse navbar-collapse">
                    <ul class="navbar-nav w-100 d-flex flex-row align-items-center justify-content-center">
                    <li class="nav-item <?php echo $activeHome; ?>"><a href="index.php?page=home#home" class="nav-link fw-bold text-darkness mx-1">Home</a></li>
                    <li class="nav-item <?php echo $activeHotel; ?>"><a href="index.php?page=home#hotel" class="nav-link fw-bold text-darkness mx-1">Hôtel</a></li>
                    <li class="nav-item <?php echo $activeRestaurant; ?>"><a href="index.php?page=home#restaurant" class="nav-link fw-bold text-darkness mx-1">Restaurant</a></li>
                        <?php if(isset($_SESSION['typeAdmin'])): ?>
                            <li class="nav-item"><a href="index.php?page=administration&section=gestion" class="nav-link fw-bold text-darkness mx-1">Gestion</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        
        <div id="translate" class="position-absolute me-1 d-flex justify-content-between">
            <a id="tradeFr"><i class="fa-solid fa-earth-americas fa-2x"></i></a>    
        </div>
    </nav>
</div>
