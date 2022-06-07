<?php 

/* Importing the Model | Import du Model */
require('models/Reservations.php');

/* Function to display the booking list | Fonction permettant d'afficher la liste des réservations */
function listReservations()
{
    if(isset($_POST['selectSearchReservation']))
    {
        /* Displays the list of customers based on a selected filter | Affiche la liste des clients en fonction d'un filtre choisi*/
        $searchReservations = new Reservations();
        $reservations = $searchReservations->searchReservation($_POST['selectSearchReservation'], $_POST['searchReservation']);
    }
    else
    {
        /* Displays the list of customers without filters | Affiche la liste des clients sans filtre */
        $listReservations = new Reservations();
        $reservations = $listReservations->listReservations();
    }

    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        $deleteReservation = '<p class="bg-success text-light text-center"> Réservation numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }
    
    require_once('views/administration/reservations/listReservations.php');
}

/* Function to display the details of a reservation during a deletion | Fonction pour afficher les détails d'une réservation lors d'une suppression */
function listReservation($id)
{
    $listReservation = new Reservations();
    $reservation = $listReservation->listReservation($id);
    echo 'N° '
        .$reservation['idReservation']
        .' - Du '.date('d/m/Y', strtotime($reservation['startDate']))
        .' au '.date('d/m/Y', strtotime($reservation['endDate']))
        .' - '.$reservation['lastname'].' '.$reservation['firstname'];
}

function createReservation()
{

    if(isset($_POST['dateStartReservation']) && isset($_POST['dateEndReservation']))
    {
        $tabRoomsDispo = [];
        $roomsDispo = new Reservations();
        $roomsBooked = $roomsDispo->reservationRoomsBooked($_POST['dateStartReservation'], $_POST['dateEndReservation']);
        $rooms = $roomsDispo->reservationRooms();
        $tabRoomsDispo = array_diff($rooms, $roomsBooked);
        $roomsDispo = $roomsDispo->reservationRoomsDispo($tabRoomsDispo);
        
        //$roomsDispo = $roomsDispo->reservationRoomsDispo($_POST['dateStartReservation'], $_POST['dateEndReservation']);
        
    }

    require_once('views/administration/reservations/createReservation.php');
}

function reservationFinish()
{
    $price = 0;

    $date = date('Y-m-d H:i:s');
    $resumReservation = new Reservations();
    $resum = $resumReservation->reservationFinish();

    $numeroReservation = intval($resum['idReservation']);
    $customer = $resum['lastname'].' '.$resum['firstname'];
    $dates = date('d/m/Y', strtotime($resum['startDate'])).' - '.date('d/m/Y', strtotime($resum['endDate']));

    $priceRooms = $resumReservation->priceRooms($resum['idReservation']);

    foreach($priceRooms as $priceRoom)
    {
        $price = $price + intval($priceRoom['price']);
    }

    $advance = $price * 0.25;
    $reste = $price - $advance;

    createInvoice($date, $price, $advance, $numeroReservation);
    
    require_once('views/administration/reservations/reservationFinal.php');
}

function createInvoice($date, $price, $advance, $numeroReservation)
{
    $addInvoice = new Reservations();
    $createInvoice = $addInvoice->createInvoice($date, $price, $advance, $numeroReservation);
}

/* Function to select a booking for when displaying, updating or deleting | Fonction pour sélectionner une réservation afin de supprimer, mettre à jour ou afficher */
function selectReservations($id = null)
{
    $selectReservations = new Reservations(); // Création d'une nouvelle instance du model Reservation
    $reservations = $selectReservations->selectReservations(); // Liste des réservations
    
    /* For each booking | Pour chaque réservation */
    foreach($reservations as $reservation)
    {
        /* If the 'id' parameter is different from the booking id or if the 'id' parameter is null
            Si le paramètre 'id' est différent de l'id de la réservation ou si le paramètre 'id' est null */
        if($id != $reservation['idReservation'] || $id == null)
        {
            // The selected variable is worthless | La variable selected ne vaut rien;
            $selected = '';
        }
        else
        {
            // The selected variable is selected | La variable selected vaut selected
            $selected = 'selected';
        }
        
        echo '<option value="'.$reservation['idReservation'].'"'.$selected.'>N° '.$reservation['idReservation']
             .' - Du '.date('d/m/Y', strtotime($reservation['startDate'])).' au '.date('d/m/Y', strtotime($reservation['endDate']))
             .' - '.$reservation['lastname'].' '.$reservation['firstname'].'</option>';
    }

}

function detailsReservation()
{
    if(isset($_GET['id']))
    {
        $detailsReservations = new Reservations();
        $details = $detailsReservations->detailsReservation($_GET['id']);

        $detailsRoomsBooked = $detailsReservations->detailsRoomsBooked($_GET['id']);
    }

    $total = $details['sumRooms'] + $details['sumExtras'] + $details['sumRestaurant'];
    $reste = $total - $details['advance'];
    $ristourne = $reste * $details['discount'];
    $net = $reste - $ristourne;

    require_once('views/administration/reservations/detailsReservation.php');
}

function updateReservation()
{
    require_once('views/administration/reservations/updateReservation.php');
}

/* Function to display the delete booking page | Fonction permettant d'afficher la page de suppression d'une réservation */
function deleteReservation()
{
    require_once('views/administration/reservations/deleteReservation.php');
}

/*  Function to delete a booking as well as the invoice and the rooms reserved related to it
    Fonction pour supprimer une réservations ainsi que la facture et les chambres réservées qui y sont liées */
function deleteAnReservation()
{
    // If parameter 'id' exist | Si le paramètre 'id' existe
    if(isset($_GET['id']))
    {
        $idReservation = $_GET['id'];

        /* Delete the invoice related to this booking | Supprimer la facture liée à cette réservation */
        $deleteInvoice = new Reservations();
        $deleteInvoice->deleteInvoice($idReservation);

        /* Delete rooms booked during this booking | Supprimer les chambres réservées lors de cette réservation */
        $deleteRoomsBooked = new Reservations();
        $deleteRoomsBooked->deleteRoomsBooked($idReservation);

        /* Delete the reservation | Supprimer la réservation */
        $deleteReservation = new Reservations();
        $deleteReservation->deleteReservation($idReservation);
    }
}
