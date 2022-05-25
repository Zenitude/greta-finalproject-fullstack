<?php require('models/Reservations.php');

function listReservations()
{

    if(isset($_GET['search']) && !empty($_GET['search']))
    {
        $searchReservations = new Reservations();
        $reservations = $searchReservations->searchReservation($_GET['search']);
    }
    else
    {
        $listReservations = new Reservations();
        $reservations = $listReservations->listReservations();
    }

    if(isset($_GET['delete']) && $_GET['delete'] = 'confirmed')
    {
        $deleteReservation = '<p class="bg-success text-light text-center"> Réservation numéro '.$_GET['id'].' supprimé avec succès ! </p>'; 
    }
    
    require_once('views/administration/reservations/listReservations.php');
}

function listReservation($id)
{
    $listReservation = new Reservations();
    $reservation = $listReservation->listReservation($id);
    echo 'N° '.$reservation['idReservation'].' - Du '.date('d/m/Y', strtotime($reservation['startDate'])).' au '.date('d/m/Y', strtotime($reservation['endDate'])).' - '.$reservation['lastname'].' '.$reservation['firstname'];
}

function searchReservation($search)
{
    
    if(isset($_GET['searchReservation']) && empty(htmlspecialchars(trim($_GET['searchReservation']))))
    {
        header('Location:index.php?page=administration&section=reservations&action=listReservations');
    }

    $searchReservation = new Reservations();
    $reservations = $searchReservation->searchReservation($search);
    
    require_once('views/administration/reservations/listReservations.php');
}

function createReservation()
{

    if(isset($_POST['dateStartReservation']) && isset($_POST['dateEndReservation']))
    {
        $roomsDispo = new Reservations();
        $verifDispo = $roomsDispo->reservationRooms($_COOKIE['reservation_dateStart'], $_COOKIE['reservation_dateEnd']);
        $rooms = $roomsDispo->reservationRoomsDispo();
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

function selectReservations($id = null)
{
    $selectReservations = new Reservations();
    $reservations = $selectReservations->selectReservations();
    
    foreach($reservations as $reservation)
    {
        if($id != $reservation['idReservation'] || $id == null)
        {
            $selected = '';
        }
        else
        {
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

function deleteReservation()
{
    require_once('views/administration/reservations/deleteReservation.php');
}

function deleteAnReservation()
{
    if(isset($_GET['id']))
    {
        $delete = new Reservations();
        $delete->deleteAnReservation($_GET['id']);
        
        require_once('views/administration/customers/listReservations.php');
    }
}