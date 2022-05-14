<?php require('models/Invoices.php');

function listInvoices()
{

    if(isset($_GET['search']) && !empty($_GET['search']))
    {
        $searchInvoices = new Invoices();
        $invoices = $searchInvoices->searchInvoice($_GET['search']);
    }
    else
    {
        $listInvoices = new Invoices();
        $invoices = $listInvoices->listInvoices();
    }

    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        $deleteInvoice = '<p class="bg-success text-light text-center"> Facture numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }
    
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