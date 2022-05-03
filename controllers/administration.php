<?php

require_once('models/Administration.php');

function gestion()
{
    require_once('views/frontend/administration/gestion.php');
}

function countCustomers()
{
    $gestion = new Administration();
    $customers = $gestion->countTheCustomers();
    $count = count($customers);
    echo $count;
}

function countReservations()
{
    $gestion = new Administration();
    $reservations = $gestion->countTheReservations();
    $count = count($reservations);
    echo $count;
}

function countInvoices()
{
    $gestion = new Administration();
    $invoices = $gestion->countTheInvoices();
    $count = count($invoices);
    echo $count;
}