<?php require('models/Customers.php');

function listCustomers()
{
  require('views/frontend/administration/customers/listCustomers.php');
}

function createCustomer()
{
    require('views/backend/administration/customers/createCustomer.php');
}

function addSpouse()
{
    require('views/backend/administration/customers/addSpouse.php');
}

function addChild()
{
    require('views/backend/administration/customers/addChild.php');
}

function readCustomer()
{
    require('views/frontend/administration/customers/readCustomer.php');
}

function updateCustomer()
{
    require('views/backend/administration/customers/updateCustomer.php');
}

function deleteCustomer()
{
    require('views/frontend/administration/customers/listCustomers.php');
}