<?php 

/* Importing the Model | Import du Model */
require('models/Invoices.php');

/* Function to display the list of invoices | Fonction pour afficher la liste des factures */
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

/* Fonction pour selectionner une factures lors d'une modification, affichage */
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
        
        echo '<option value="'.$invoice['idInvoice'].'"'.$selected.'>'
                .'Fact N° '.$invoice['idInvoice'].' du '.date('d/m/Y', strtotime($invoice['date'])).' - '.$invoice['lastname'].' '.$invoice['firstname']
             .'</option>';
    }
}

/* Function to select an invoice during a modification, display | Fonction pour afficher les détails d'une facture */
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
    $ristourne = $details['sumRooms'] * $details['discount'];
    $reste = $montantTotal - $ristourne ;
    $net = $reste - $details['advance'];
    }

    require_once('views/administration/invoices/detailsInvoice.php');
}

function updateInvoice()
{
    require_once('views/administration/invoices/updateInvoice.php');
}

function updateTheInvoice()
{ 
    if(isset($_POST['updateDiscountInvoice'])) // Check if the Lastname field is submit | On vérifie si le champ Nom est envoyé
    {
        try
        {
            // Data is transferred to variables | Les données sont transférées dans des variables
            $updateId = $_POST['updateIdInvoice'];
            $updateDiscount = trim(htmlspecialchars($_POST['updateDiscountInvoice']));
            $discount = floatval($updateDiscount) / 100;

            $updateTheInvoice = new Invoices();
            $updateInvoice = $updateTheInvoice->updateInvoice($updateId, $discount);
            
            /*  If the update is successful, redirect to the update page and display a message
                En cas de succès de la mise à jour on redirige sur la page de mise à jour et on affiche un message */
            header('Location: index.php?page=administration&section=invoices&action=updateInvoice&id='.$updateId.'&validation=ok');
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }
    
}
