<?php 

require('models/Invoices.php');

function listInvoices()
{
    if(isset($_POST['selectSearchInvoice']))
    {
        /* Displays the list of customers based on a selected filter | Affiche la liste des clients en fonction d'un filtre choisi*/
        $searchInvoices = new Invoices();
        $invoices = $searchInvoices->searchInvoice($_POST['selectSearchInvoice'], $_POST['searchInvoice']);
    }
    else
    {
        /* Displays the list of customers without filters | Affiche la liste des clients sans filtre */
        $listInvoices = new Invoices();
        $invoices = $listInvoices->listInvoices();
    }
    
    require_once('views/administration/invoices/listInvoices.php');
}

function detailsInvoice()
{
    if(isset($_GET['id'])) 
    {

    $detailsInvoice = new Invoices();
    $details = $detailsInvoice->detailsInvoice($_GET['id']);

    $detailsRoomsBooked = new Invoices();
    $roomsBooked = $detailsRoomsBooked->detailsRoomsBooked($_GET['id']);

    $montantTotal = $details['sumRooms'] + $details['sumExtras'] + $details['sumRestaurant'];
    $percentRistourne = $details['discount'] * 100;
    $ristourne = $details['sumRooms'] * ($percentRistourne / 100);
    $reste = $montantTotal - $ristourne ;
    $net = $reste + $details['sumExtras'] + $details['sumRestaurant'];
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