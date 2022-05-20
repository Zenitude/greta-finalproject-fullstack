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

function reservationCustomer()
{
    require_once('views/administration/reservations/reservationCustomer.php');
}

function reservationDates()
{
    if(isset($_POST['selectReservationCustomer'])){ setCookie('reservation_customer', $_POST['selectReservationCustomer'], 0, '/', '', false, true); } 

    require_once('views/administration/reservations/reservationDates.php');
}

function reservationRooms()
{
    if(isset($_POST['dateStartReservation']) && isset($_POST['dateEndReservation']))
    {
        setCookie('reservation_dateStart', $_POST['dateStartReservation'], 0, '/', '', false, true);
        setCookie('reservation_dateEnd', $_POST['dateEndReservation'], 0, '/', '', false, true);
    }

    $roomsDispo = new Reservations();
    $verifDispo = $roomsDispo->reservationRooms($_COOKIE['reservation_dateStart'], $_COOKIE['reservation_dateEnd']);
    $rooms = $roomsDispo->reservationRoomsDispo();

    require_once('views/administration/reservations/reservationRooms.php');
}

function reservationFinish()
{
    $price = 0;

    $resumReservation = new Reservations();
    $resum = $resumReservation->reservationFinish();

    $numeroReservation = $resum['idReservation'];
    $customer = $resum['lastname'].' '.$resum['firstname'];
    $dates = $resum['startDate'].' - '.$resum['endDate'];

    foreach($resum['price'] as $priceRoom)
    {
        $price = $price + $priceRoom;
    }

    $advance = $price * 0.5;
    $reste = $price - $advance;
    
    require_once('views/administration/reservations/reservationFinal.php');
}

function readReservation()
{
    require_once('views/administration/reservations/readReservation.php');
}

function updateReservation()
{
    require_once('views/administration/reservations/updateReservation.php');
}

function deleteReservation()
{
    require_once('views/administration/reservations/listReservations.php');
}