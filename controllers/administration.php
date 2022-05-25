<?php

/*  Importing the Model
    Import du Model */
require_once('models/Administration.php');

/*  Function displaying the management page
    Fonction affichant la page de gestion */
function gestion()
{
    /* Importing the view | Import de la vue */
    require_once('views/administration/gestion.php');
}

/*  Function to know the number of customers in the database, the result is displayed on the management page
    Fonction permettant de connaître le nombre de clients dans la base de données, le résultat est affiché sur la page de gestion */
function countCustomers()
{
    $gestion = new Administration();
    $customers = $gestion->countTheCustomers();
    $count = count($customers);
    echo $count;
}

/*  Function to know the number of reservations in the database, the result is displayed on the management page
    Fonction permettant de connaître le nombre de réservations dans la base de données, le résultat est affiché sur la page de gestion */
function countReservations()
{
    $gestion = new Administration();
    $reservations = $gestion->countTheReservations();
    $count = count($reservations);
    echo $count;
}

/*  Function to know the number of invoices in the database, the result is displayed on the management page
    Fonction permettant de connaître le nombre de factures dans la base de données, le résultat est affiché sur la page de gestion */
function countInvoices()
{
    $gestion = new Administration();
    $invoices = $gestion->countTheInvoices();
    $count = count($invoices);
    echo $count;
}