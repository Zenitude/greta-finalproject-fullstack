<?php require('models/Invoices.php');

function listInvoices()
{
    $listInvoices = new Invoices();
    $invoices = $listInvoices->listInvoices();

    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        $deleteInvoice = '<p class="bg-success text-light text-center"> Facture numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }

    if(isset($_GET['searchInvoice']) && !empty(htmlspecialchars(trim($_GET['searchInvoice']))))
    {
        searchInvoice($_GET['searchInvoice']);
    }

    require_once('views/frontend/administration/invoices/listInvoices.php');
}

function searchInvoice($search)
{
    if(isset($_GET['search']) && empty(htmlspecialchars(trim($_GET['search']))))
    {
        header('Location:index.php?page=administration&section=invoices&action=listInvoices');
    }

    $searchInvoice = new Invoices();
    $invoices = $searchInvoice->searchInvoice($search);
    
    require_once('views/frontend/administration/invoices/listInvoices.php');
}

function createInvoice()
{
    require('views/backend/administration/invoices/createInvoice.php');
}

function readInvoice()
{
    require('views/frontend/administration/invoices/readInvoice.php');
}

function updateInvoice()
{
    require('views/backend/administration/invoices/updateInvoice.php');
}

function deleteInvoice()
{
    require('views/frontend/administration/invoices/listInvoices.php');
}