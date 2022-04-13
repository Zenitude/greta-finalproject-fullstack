<?php require('models/reservations.php');

function listReservations()
{
  require('views/frontend/reservationh/reservations/listReservations.php');
}

function reservationRoom()
{
    require('views/backend/reservationh/reservations/reservationRoom.php');
}

function reservationCustomer()
{
    require('views/backend/reservationh/reservations/reservationCustomer.php');
}

function reservationFinal()
{
    require('views/backend/reservationh/reservations/reservationFinal.php');
}

function readReservation()
{
    require('views/frontend/reservationh/reservations/readReservation.php');
}

function updateReservation()
{
    require('views/backend/reservationh/reservations/updateReservation.php');
}

function deleteReservation()
{
    require('views/frontend/reservationh/reservations/listReservations.php');
}