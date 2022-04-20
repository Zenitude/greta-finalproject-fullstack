<!-- Page title / Titre de la page -->
<?php 
    
    $title = 'Réservation Hôtel | Administration'; 
?>
<?php 
    if(isset($_SESSION['userAdmin'])):
?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<h1>Vous êtes connecté !</h1>
<a href="<?php session_destroy(); header('Location: index.php?page=home');?>">Détruire session</a>

<section id="customers">

    <div class="containerGestion">

        <header>
            <h2>Clients</h2>
            <hr>
        </header>

        <div class="containerContent">

            <div class="containerBtns">
                <a href="" class="btn-listing">
                    <img src="" alt="Lister les clients">
                <br>Lister</a>

                <a href="" class="btn-create">
                    <img src="" alt="Créer un client">
                <br>Créer</a>

                <a href="" class="btn-update">
                    <img src="" alt="Modifier un client">
                <br>Modifier</a>
                <a href="" class="btn-delete">
                    <img src="" alt="supprimer un client">
                <br>Supprimer</a>
            </div>

            <hr>

            <div class="containerCount">
                <h3>Nombre de clients</h3>
                <?php
                    $sqlqueryCountCustomers = "SELECT * FROM `customers`";
                    $queryCountCustomers = $db->prepare($sqlqueryCountCustomers);
                    $queryCountCustomers->execute();
                    $CountCustomers = $queryCountCustomers->fetchAll();
                    $numberCustomers = count($CountCustomers);
                    echo '<p>'.$numberCustomers.'</p>'; 
                ?>
            </div>

        </div>

    </div>
        
</section>

<section id="reservations">

    <div class="containerGestion">

        <header>
            <h2>Réservations</h2>
            <hr>
        </header>

        <div class="containerContent">

            <div class="containerBtns">
                <a href="" class="btn-listing">
                    <img src="" alt="Lister les réservations">
                <br>Lister</a>

                <a href="" class="btn-create">
                    <img src="" alt="Créer une réservation">
                <br>Créer</a>

                <a href="" class="btn-update">
                    <img src="" alt="Modifier une réservation">
                <br>Modifier</a>
                <a href="" class="btn-delete">
                    <img src="" alt="supprimer une réservation">
                <br>Supprimer</a>

                <a href="" class="btn-create">
                    <img src="" alt="Réserver une table">
                <br>Tables</a>

                <a href="" class="btn-create">
                    <img src="" alt="Choisir les menus">
                <br>Menus</a>
            </div>

            <hr>

            <div class="containerCount">
                <h3>Nombre de Réservations</h3>
                <?php
                    $sqlqueryCountReservations = "SELECT * FROM `reservations`";
                    $queryCountReservations = $db->prepare($sqlqueryCountReservations);
                    $queryCountReservations->execute();
                    $CountReservations = $queryCountReservations->fetchAll();
                    $numberReservations = count($CountReservations);
                    echo '<p>'.$numberReservations.'</p>'; 
                ?>
            </div>

        </div>

    </div>
        
</section>

<section id="invoices">

    <div class="containerGestion">

        <header>
            <h2>Factures</h2>
            <hr>
        </header>

        <div class="containerContent">

            <div class="containerBtns">
                <a href="" class="btn-listing">
                    <img src="" alt="Lister les factures">
                <br>Lister</a>

                <a href="" class="btn-create">
                    <img src="" alt="Créer une facture">
                <br>Créer</a>

                <a href="" class="btn-update">
                    <img src="" alt="Modifier une facture">
                <br>Modifier</a>
                <a href="" class="btn-delete">
                    <img src="" alt="supprimer une facture">
                <br>Supprimer</a>
            </div>

            <hr>

            <div class="containerCount">
                <h3>Nombre de Factures</h3>
                <?php
                    $sqlqueryCountInvoices = "SELECT * FROM `invoices`";
                    $queryCountInvoices = $db->prepare($sqlqueryCountInvoices);
                    $queryCountInvoices->execute();
                    $CountInvoices = $queryCountInvoices->fetchAll();
                    $numberInvoices = count($CountInvoices);
                    echo '<p>'.$numberInvoices.'</p>'; 
                ?>
            </div>

        </div>

    </div>
        
</section>



<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php 
    require('views/template.php');
    else: header('Location: index.php?page=connexion&action=login');
    endif;
    