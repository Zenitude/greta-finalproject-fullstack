<?php require('models/Reservations.php');

function listReservations()
{
  require('views/frontend/administration/reservations/listReservations.php');
}

function reservationRoom()
{
    require('views/backend/administration/reservations/reservationRoom.php');
}

function reservationCustomer()
{
    require('views/backend/administration/reservations/reservationCustomer.php');
}

function reservationFinal()
{
    require('views/backend/administration/reservations/reservationFinal.php');
}

function readReservation()
{
    require('views/frontend/administration/reservations/readReservation.php');
}

function updateReservation()
{
    require('views/backend/administration/reservations/updateReservation.php');
}

function deleteReservation()
{
    require('views/frontend/administration/reservations/listReservations.php');
}