<?php require('models/Invoices.php');

function listInvoices()
{
  require('views/frontend/administration/listInvoices.php');
}

function createInvoice()
{
    require('views/backend/administration/invoices/createInvoice.php');
}

function readInvoice()
{
    require('views/frontend/administration/invoices/readInvoice.php');
}

function updateInvoice()
{
    require('views/backend/administration/invoices/updateInvoice.php');
}

function deleteInvoice()
{
    require('views/frontend/administration/invoices/listInvoices.php');
}