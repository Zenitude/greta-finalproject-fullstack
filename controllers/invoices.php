<?php 

require('models/Invoices.php');

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
    
    require_once('views/administration/invoices/listInvoices.php');
}

function detailsInvoice()
{
    if(isset($_GET['id'])) 
    {

    $detailsInvoice = new Invoices();
    $details = $detailsInvoice->detailsInvoice($_GET['id']);

    $montantTotal = $details['sumRooms'] + $details['sumExtras'] + $details['sumRestaurant'];
    $reste = $montantTotal - $details['advance'];
    $percentRistourne = $details['discount'] * 100;
    $ristourne = $reste * ($percentRistourne / 100);
    $net = $reste - $ristourne;
    }

    require_once('views/administration/invoices/detailsInvoice.php');
}

function pdfInvoice()
{
    if(isset($_GET['id']))
    {
        $detailsInvoice = new Invoices();
        $details = $detailsInvoice->detailsInvoice($_GET['id']);
    
        $montantTotal = $details['sumRooms'] + $details['sumExtras'] + $details['sumRestaurant'];
        $reste = $montantTotal - $details['advance'];
        $percentRistourne = $details['discount'] * 100;
        $ristourne = $reste * ($percentRistourne / 100);
        $net = $reste - $ristourne;

    }

    require_once('views/administration/invoices/pdfInvoice.php');
}

function selectInvoices($id = null)
{
    $selectTheInvoices = new Invoices();
    $selectInvoices = $selectTheInvoices->selectTheInvoices();

    foreach($selectInvoices as $invoice)
    {
        if($id != $invoice['idInvoice'] || $id == null)
        {
            $selected = '';
        }
        else
        {
            $selected = 'selected';
        }
        
        echo '<option value="'.$invoice['idInvoice'].'"'.$selected.'>'.'Fact N° '.$invoice['idInvoice'].' du '.date('d/m/Y', strtotime($invoice['date'])).' - '.$invoice['lastname'].' '.$invoice['firstname'].'</option>';
    }
}

function createInvoice()
{
    require('views/administration/invoices/createInvoice.php');
}

function readInvoice()
{
    require('views/administration/invoices/readInvoice.php');
}

function updateInvoice()
{
    require('views/administration/invoices/updateInvoice.php');
}

function deleteInvoice()
{
    require('views/administration/invoices/listInvoices.php');
}