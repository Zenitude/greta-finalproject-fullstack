<?php require('models/Invoices.php');

function listInvoices()
{
  require('views/frontend/reservationh/listInvoices.php');
}

function createInvoice()
{
    require('views/backend/reservationh/invoices/createInvoice.php');
}

function readInvoice()
{
    require('views/frontend/reservationh/invoices/readInvoice.php');
}

function updateInvoice()
{
    require('views/backend/reservationh/invoices/updateInvoice.php');
}

function deleteInvoice()
{
    require('views/frontend/reservationh/invoices/listInvoices.php');
}