<!-- Page title / Titre de la page -->
<?php $title = 'Réservation Hôtel | Administration'; ?>

<!-- If an admin session is active display the admin page  | Si une session admin est active afficher la page d'administration -->
<?php if(($_SESSION['userAdmin'] != NULL)): ?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<h1 class="text-center my-3">Bonjour <?= $_SESSION['userAdmin']?> !</h1>

<section id="customers" class="sectionGestion">

    <div class="containerGestion">

        <!-- Customers Panel Header | En-tête du panneau clients -->
        <header>
            <h2>Clients</h2>
            <hr>
        </header>

        <!-- Customers Panel Buttons | Boutons du panneau clients -->
        <div class="containerContent">

            <div class="containerBtns">

                <!-- List | Lister -->
                <a href="index.php?page=administration&section=customers&action=listCustomers">
                    <img src="public/resources/images/gestion/lister.png" alt="Lister les clients">
                <br>Lister</a>

                <!-- Details | Détails -->
                <a href="index.php?page=administration&section=customers&action=detailsCustomer">
                    <img src="public/resources/images/gestion/voir.png" alt="Afficher un client">
                <br>Détails</a>

                <!-- Create | Créer -->
                <?php if($_SESSION['typeAdmin'] != 'adminRestaurant'): ?>
                <a href="index.php?page=administration&section=customers&action=createCustomer">
                    <img src="public/resources/images/gestion/ajouter.png" alt="Créer un client">
                <br>Créer</a>

                <!-- Update | Modifier -->
                <a href="index.php?page=administration&section=customers&action=updateCustomer">
                    <img src="public/resources/images/gestion/modifier.png" alt="Modifier un client">
                <br>Modifier</a>

                <!-- Delete | Supprimer -->
                <a href="index.php?page=administration&section=customers&action=deleteCustomer">
                    <img src="public/resources/images/gestion/supprimer.png" alt="supprimer un client">
                <br>Supprimer</a>
                <?php endif; ?>
            </div>

            <hr>

            <!-- Customers Panel Counter | Compteur du panneau clients -->
            <div class="containerCount">
                <h3>Nombre de clients</h3>
                <span class="fs-3 fw-bold"><?php countCustomers(); ?></span>
            </div>

        </div>

    </div>
        
</section>

<section id="reservations" class="sectionGestion">

    <div class="containerGestion">

        <!-- Reservations panel header | En-tête du panneau Réservations -->
        <header>
            <h2>Réservations</h2>
            <hr>
        </header>

        <!-- Reservations panel buttons | Boutons du panneau Réservations -->
        <div class="containerContent">

            <div class="containerBtns">

                <!-- If the admin is different from the Restaurant admin | Si l'admin est différent de l'admin Restaurant -->
                <?php if($_SESSION['typeAdmin'] != 'adminRestaurant'): ?>
                
                <!-- List | Lister -->
                <a href="index.php?page=administration&section=reservations&action=listReservations">
                    <img src="public/resources/images/gestion/lister.png" alt="Lister les réservations">
                <br>Lister</a>

                <!-- Details | Détails -->
                <a href="index.php?page=administration&section=reservations&action=detailsReservation">
                    <img src="public/resources/images/gestion/voir.png" alt="Afficher une réservation">
                <br>Détails</a>

                <!-- Create | Créer -->
                <a href="index.php?page=administration&section=reservations&action=createReservation">
                    <img src="public/resources/images/gestion/ajouter.png" alt="Créer une réservation">
                <br>Créer</a>

                <!-- Update | Modifier -->
                <a href="index.php?page=administration&section=reservations&action=updateReservation">
                    <img src="public/resources/images/gestion/modifier.png" alt="Modifier une réservation">
                <br>Modifier</a>

                <!-- Delete | Supprimer -->
                <a href="index.php?page=administration&section=reservations&action=deleteReservation">
                    <img src="public/resources/images/gestion/supprimer.png" alt="supprimer une réservation">
                <br>Supprimer</a>

                <!-- Extras | Extras -->
                <a href="index.php?page=administration&section=reservations&action=addExtras">
                    <img src="public/resources/images/gestion/ajouter.png" alt="Ajouter des extras">
                <br>Extras</a>
                <?php endif; ?>

                <!-- Tables | Tables -->
                <!-- If the admin is different from the Hotel admin | Si l'admin est différent de l'admin Hotel -->
                <?php if($_SESSION['typeAdmin'] != 'adminHotel'): ?>
                <a href="index.php?page=administration&section=reservations&action=reserveTable">
                    <img src="public/resources/images/gestion/table.png" alt="Réserver une table">
                <br>Tables</a>

                <!-- Menus | Menus -->
                <a href="index.php?page=administration&section=reservations&action=choiceMenus">
                    <img src="public/resources/images/gestion/menus.png" alt="Choisir les menus">
                <br>Menus</a>
                <?php endif; ?>
            </div>

            <hr>

            <!-- Reservations Panel Counter | Compteur du panneau réservations -->
            <div class="containerCount">
                <h3>Nombre de Réservations</h3>
                <span class="fs-3 fw-bold"><?php countReservations(); ?></span>
            </div>

        </div>

    </div>
        
</section>

<?php if($_SESSION['typeAdmin'] != 'adminRestaurant'): ?>
<section id="invoices" class="sectionGestion">

    <div class="containerGestion">

        <!-- Header panel invoices | En-tête du panneau Factures -->
        <header>
            <h2>Factures</h2>
            <hr>
        </header>

        <!-- Buttons pannel invoices | Boutons du panneau factures -->
        <div class="containerContent">

            <div class="containerBtns">

                <!-- List | Lister -->
                <a href="index.php?page=administration&section=invoices&action=listInvoices">
                    <img src="public/resources/images/gestion/lister.png" alt="Lister les factures">
                <br>Lister</a>

                <!-- Details | Détails -->
                <a href="index.php?page=administration&section=invoices&action=detailsInvoice">
                    <img src="public/resources/images/gestion/voir.png" alt="Détails facture">
                <br>Détails</a>

                <!-- Update | Modifier -->
                <a href="index.php?page=administration&section=invoices&action=updateInvoice">
                    <img src="public/resources/images/gestion/modifier.png" alt="Modifier une facture">
                <br>Modifier</a>

            </div>

            <hr>

            <!-- Invoices Panel Counter | Compteur du panneau factures -->
            <div class="containerCount">
                <h3>Nombre de Factures</h3>
                <span class="fs-3 fw-bold"><?php countInvoices(); ?></span>
            </div>

        </div>

    </div>
        
</section>
<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<!-- End of content / Fin du contenu -->

<!-- Template call / Appel du template -->
<?php 
    require_once('views/template.php');

    // If no admin session is active redirect to login page | Si aucune session admin n'est active rediriger vers la page de connexion
    else: header('Location: index.php?page=connexion');
    endif;
