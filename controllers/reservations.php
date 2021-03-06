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

/* Feature displaying non-reserved rooms when creating a reservation | Fonction affichant les chambres non réservées lors de la création d'une réservation */
function createReservation()
{

    if(isset($_POST['dateStartReservation']) && isset($_POST['dateEndReservation']))
    {
        $tabRoomsDispo = [];
        $roomsDispo = new Reservations();

        /* Retrieval of room IDs booked according to certain dates in a table | Récupération des id des chambres réservées selon certaines dates dans un tableau */
        $roomsBooked = $roomsDispo->reservationRoomsBooked($_POST['dateStartReservation'], $_POST['dateEndReservation']);

        /* Retrieving IDs from all existing chambers in a table | Récupération des id de toutes les chambres existantes dans un tableau */
        $rooms = $roomsDispo->reservationRooms();

        /* Comparison of the two tables to keep only the ids of the non-reserved rooms | Comparaison des deux tableaux pour ne garder que les ids des chambres non réservées */
        $tabRoomsDispo = array_diff($rooms, $roomsBooked);

        /* Retrieving details of non-reserved rooms | Récupération des détails des chambres non réservées */
        $roomsDispo = $roomsDispo->reservationRoomsDispo($tabRoomsDispo);   
    }

    require_once('views/administration/reservations/createReservation.php');
}

/* Function displaying details when finalizing a booking | Fonction affichant les détails lors de la finalisation d'une réservation */
function reservationFinish()
{

    /* Retrieval of booking information | Récupération des informations de la réservation */
    $resumReservation = new Reservations();
    $resum = $resumReservation->reservationFinish();

    /* Booking Number | Numéro de la réservation */
    $numeroReservation = intval($resum['idReservation']);

    /* customer information | Informations du Client */
    $customer = $resum['lastname'].' '.$resum['firstname'];

    /* Dates of booking | Dates de la réservation */
    $dates = date('d/m/Y', strtotime($resum['startDate'])).' - '.date('d/m/Y', strtotime($resum['endDate']));
    $firstDay = explode('-', $resum['startDate']);
    $lastDay = explode('-', $resum['endDate']);
    $countDay =  intval($lastDay[2]) - intval($firstDay[2]);

    /* Retrieval of room information | Récupération des informations des chambres */
    $priceRooms = $resumReservation->priceRooms($resum['idReservation']);

    /* Total amount of rooms | Cumul du montant total des chambres */
    $price = 0;

    foreach($priceRooms as $priceRoom)
    {
        $price = $price + (intval($priceRoom['price']) * $countDay);
    }

    /* Calculation of the deposit | Calcul de l'acompte */
    $advance = $price * 0.25;

    /* Calcul restant à payer */
    $reste = $price - $advance;

    /* Date de la facture */
    $date = date('Y-m-d H:i:s');

    /* Creating the Invoice | Création de la facture */
    createInvoice($date, $price, $advance, $numeroReservation);
    
    require_once('views/administration/reservations/reservationFinal.php');
}

/* Function to create the invoice corresponding to a booking | Fonction pour créer la facture correspondant à une réservation */
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

/* Function displaying booking details | Fonction affichant les détails d'une réservation */
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

/* Function displaying the update page of a booking | Fonction affichant la page de mise à jour d'une réservation */
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
