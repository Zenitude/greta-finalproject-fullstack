<!-- Page title / Titre de la page -->
<?php

    $title = 'Réservation Hôtel | Administration'; 
?>
<?php 
    if(($_SESSION['userAdmin'] != NULL)):
?>

<!-- Start of content / Début du contenu -->
<?php ob_start(); ?>

<h1 class="text-center my-3">Bonjour <?= $_SESSION['userAdmin'] ?> !</h1>


<section id="customers" class="sectionGestion">

    <div class="containerGestion">

        <header>
            <h2>Clients</h2>
            <hr>
        </header>

        <div class="containerContent">

            <div class="containerBtns">
                <a href="index.php?page=gestion&section=customers&action=listCustomers" class="btn-listing">
                    <img src="public/resources/images/gestion/lister.png" alt="Lister les clients" class="">
                <br>Lister</a>

                <a href="index.php?page=gestion&section=customers&action=createCustomer" class="btn-create">
                    <img src="public/resources/images/gestion/ajouter.png" alt="Créer un client">
                <br>Créer</a>

                <a href="index.php?page=gestion&section=customers&action=updateCustomer" class="btn-update">
                    <img src="public/resources/images/gestion/modifier.png" alt="Modifier un client">
                <br>Modifier</a>
                <a href="index.php?page=gestion&section=customers&action=deleteCustomer" class="btn-delete">
                    <img src="public/resources/images/gestion/supprimer.png" alt="supprimer un client">
                <br>Supprimer</a>
            </div>

            <hr>

            <div class="containerCount">
                <h3>Nombre de clients</h3>
                <?php
                
                    /*
                    $sqlqueryCountCustomers = "SELECT * FROM `customers`";
                    $queryCountCustomers = $db->prepare($sqlqueryCountCustomers);
                    
                    try{
                        if($queryCountCustomers->execute())
                        {
                            $CountCustomers = $queryCountCustomers->fetchAll();
                            $numberCustomers = count($CountCustomers);
                            echo '<p>'.$numberCustomers.'</p>'; 
                        }
                    }
                    catch(Exception $e)
                    {
                        throw new Exception('Erreur = '.$e->getMessage());
                    }*/
                ?>
            </div>

        </div>

    </div>
        
</section>

<section id="reservations" class="sectionGestion">

    <div class="containerGestion">

        <header>
            <h2>Réservations</h2>
            <hr>
        </header>

        <div class="containerContent">

            <div class="containerBtns">
                <a href="index.php?page=gestion&section=reservations&action=listReservations" class="btn-listing">
                    <img src="public/resources/images/gestion/lister.png" alt="Lister les réservations">
                <br>Lister</a>

                <a href="index.php?page=gestion&section=reservations&action=createReservation" class="btn-create">
                    <img src="public/resources/images/gestion/ajouter.png" alt="Créer une réservation">
                <br>Créer</a>

                <a href="index.php?page=gestion&section=reservations&action=updateReservation" class="btn-update">
                    <img src="public/resources/images/gestion/modifier.png" alt="Modifier une réservation">
                <br>Modifier</a>

                <a href="index.php?page=gestion&section=reservations&action=deleteReservation" class="btn-delete">
                    <img src="public/resources/images/gestion/supprimer.png" alt="supprimer une réservation">
                <br>Supprimer</a>

                <a href="index.php?page=gestion&section=reservations&action=addExtras" class="btn-create">
                    <img src="public/resources/images/gestion/ajouter.png" alt="Ajouter des extras">
                <br>Extras</a>

                <a href="index.php?page=gestion&section=reservations&action=reserveTable" class="btn-create">
                    <img src="public/resources/images/gestion/table.png" alt="Réserver une table">
                <br>Tables</a>

                <a href="index.php?page=gestion&section=reservations&action=choiceMenus" class="btn-create">
                    <img src="public/resources/images/gestion/menus.png" alt="Choisir les menus">
                <br>Menus</a>
            </div>

            <hr>

            <div class="containerCount">
                <h3>Nombre de Réservations</h3>
                <?php
                    /*$sqlqueryCountReservations = "SELECT * FROM `reservationshotel`";
                    $queryCountReservations = $db->prepare($sqlqueryCountReservations);
                    
                    try{
                        if($queryCountReservations->execute())
                        {
                            $CountReservations = $queryCountReservations->fetchAll();
                            $numberReservations = count($CountReservations);
                            echo '<p>'.$numberReservations.'</p>'; 
                        }
                    }
                    catch(Exception $e)
                    {
                        throw new Exception('Erreur = '.$e->getMessage());
                    }*/
                ?>
            </div>

        </div>

    </div>
        
</section>

<section id="invoices" class="sectionGestion">

    <div class="containerGestion">

        <header>
            <h2>Factures</h2>
            <hr>
        </header>

        <div class="containerContent">

            <div class="containerBtns">
                <a href="index.php?page=gestion&section=invoices&action=listInvoices" class="btn-listing">
                    <img src="public/resources/images/gestion/lister.png" alt="Lister les factures">
                <br>Lister</a>

                <a href="index.php?page=gestion&section=invoices&action=createInvoice" class="btn-create">
                    <img src="public/resources/images/gestion/ajouter.png" alt="Créer une facture">
                <br>Créer</a>

                <a href="index.php?page=gestion&section=invoices&action=updateInvoice" class="btn-update">
                    <img src="public/resources/images/gestion/modifier.png" alt="Modifier une facture">
                <br>Modifier</a>

                <a href="index.php?page=gestion&section=invoices&action=deleteInvoice" class="btn-delete">
                    <img src="public/resources/images/gestion/supprimer.png" alt="supprimer une facture">
                <br>Supprimer</a>
            </div>

            <hr>

            <div class="containerCount">
                <h3>Nombre de Factures</h3>
                <?php
                   /* $sqlqueryCountInvoices = "SELECT * FROM `invoices`";
                    $queryCountInvoices = $db->prepare($sqlqueryCountInvoices);
                    $queryCountInvoices->execute();
                    
                    try{
                        if($queryCountInvoices->execute())
                        {
                            $CountInvoices = $queryCountInvoices->fetchAll();
                            $numberInvoices = count($CountInvoices);
                            echo '<p>'.$numberInvoices.'</p>'; 
                        }
                    }
                    catch(Exception $e)
                    {
                        throw new Exception('Erreur = '.$e->getMessage());
                    }*/
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
    