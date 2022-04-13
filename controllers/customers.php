<?php require('models/customers.php');

function listCustomers()
{
  require('views/frontend/reservationh/customers/listCustomers.php');
}

function createCustomer()
{
    require('views/backend/reservationh/customers/createCustomer.php');
}

function addSpouse()
{
    require('views/backend/reservationh/customers/addSpouse.php');
}

function addChild()
{
    require('views/backend/reservationh/customers/addChild.php');
}

function readCustomer()
{
    require('views/frontend/reservationh/customers/readCustomer.php');
}

function updateCustomer()
{
    require('views/backend/reservationh/customers/updateCustomer.php');
}

function deleteCustomer()
{
    require('views/frontend/reservationh/customers/listCustomers.php');
}