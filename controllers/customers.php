<?php require('models/Customers.php');

function listCustomers()
{
    $listCustomers = new Customers();
    $customers = $listCustomers->listCustomer();

    require('views/frontend/administration/customers/listCustomers.php');
}

function numberOfReservations($id)
{
    $reservations = new Customers();
    $numberReservations = $reservations->numberReservation($id);
    $reservations = $numberReservations->fetch();
    $countReservations = count($reservations);
    return $countReservations;
}

function createCustomer()
{
    require_once('views/backend/administration/customers/createCustomer.php');
}

function addAnCustomer()
{
    try
    {
        if(isset($_POST['lastnameCustomer'])) // Check if the Lastname field is submit | On vérifie si le champ Nom est envoyé
        {
            var_dump($_POST['lastnameCustomer']);
            print($_POST['lastnameCustomer']);
    
            // Check if the fields are empty by filtering the whitespaces and html tags | On vérifie si les champs sont vide tout en filtrant les espaces blancs et les balises html
            if(empty(trim(htmlspecialchars($_POST['lastnameCustomer']))) || empty(trim(htmlspecialchars($_POST['firstnameCustomer']))) || empty(trim(htmlspecialchars($_POST['mailCustomer']))) 
            || empty(htmlspecialchars(trim($_POST['phoneCustomer']))) || empty(htmlspecialchars(trim($_POST['birthDateCustomer']))) || empty(htmlspecialchars(trim($_POST['streetCustomer'])))
            || empty(htmlspecialchars(trim($_POST['zipCodeCustomer']))) || empty(htmlspecialchars(trim($_POST['cityCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=all');
            }
            elseif(empty(trim(htmlspecialchars($_POST['lastnameCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=lastname');
            }
            elseif(empty(trim(htmlspecialchars($_POST['firstnameCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=firstname');
            }
            elseif(empty(trim(htmlspecialchars($_POST['mailCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=mail');
            }
            elseif(empty(trim(htmlspecialchars($_POST['phoneCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=phone');
            }
            elseif(empty(trim(htmlspecialchars($_POST['birthDateCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=birthDate');
            }
            elseif(empty(trim(htmlspecialchars($_POST['streetCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=street');
            }
            elseif(empty(trim(htmlspecialchars($_POST['zipCodeCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=zipCode');
            }
            elseif(empty(trim(htmlspecialchars($_POST['countryCustomer']))))
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=city');
            }
            else
            {
                try
                {
                        // check if the email is valid | On vérifie si l'email est valide
                    if (!filter_var($_POST["mailCustomer"], FILTER_VALIDATE_EMAIL)) 
                    {
                        header('Location: index.php?page=administration&section=gestion&action=createCustomer&err=mailwrong');
                    }
                    else
                    {
                        // Field data is transferred to variables
                        $lastname = trim(htmlspecialchars($_POST['lastnameCustomer']));
                        $firstname = trim(htmlspecialchars($_POST['firstnameCustomer']));
                        $mail = trim(htmlspecialchars($_POST['mailCustomer']));
                        $birthDate = trim(htmlspecialchars($_POST['birthDateCustomer']));
                        $street = trim(htmlspecialchars($_POST['streetCustomer']));
                        $zipCode = trim(htmlspecialchars($_POST['zipCodeCustomer']));
                        $city = trim(htmlspecialchars($_POST['cityCustomer']));
                        $vip = trim(htmlspecialchars($_POST['vipCustomer']));
                        $idConjoint = trim(htmlspecialchars($_POST['selectSpouse']));
        
                        // Transfer phone data to a variable by removing unnecessary items | On transfère les données du téléphone dans une variable en supprimant les éléments inutiles
                        $phoneCustomer = trim(htmlspecialchars($_POST['phoneCustomer']), " \-_.");
                        
                        // format the phone (01 to 09 + 4 pairs of digits separated by dots) | On formate le téléphone (01 à 09 + 4 paires de chiffres séparés par des points)
                        $regexPhone = '(0|[1-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])[.]([0-9]|[0-9])';
        
                        if(preg_match($regexPhone, $phoneCustomer))
                        {
                            // If the phone is already formatted correctly we do nothing | Si le téléphone est déjà formaté correctement on ne fait rien
                            $phone = $phoneCustomer; 
                        }
                        else
                        {
                            // If the phone is not formatted correctly it is reformatted | Si le téléphone n'est pas formaté correctement on le reformate
                            $phone = sprintf("%s.%s.%s.%s.%s",
                            substr($phoneCustomer, 0, 2),
                            substr($phoneCustomer, 2, 2),
                            substr($phoneCustomer, 4, 2),
                            substr($phoneCustomer, 6, 2),
                            substr($phoneCustomer, 8, 2));
                        }
        
                        var_dump('nom : $lastname');
                        var_dump($firstname);
                        var_dump($mail);
                        var_dump($phone);
                        var_dump($birthDate);
                        var_dump($street);
                        var_dump($zipCode);
                        var_dump($city);
                        var_dump($idConjoint);
        
                        print('nom : $lastname');
                        print($firstname);
                        print($mail);
                        print($phone);
                        print($birthDate);
                        print($street);
                        print($zipCode);
                        print($city);
                        print($idConjoint);
        
                        $addCustomer = new Customers;
                        $addCustomer->addCustomer($lastname, $firstname, $mail, $phone, $birthDate, $street, $zipCode, $city, $vip, $idConjoint);
                        
                        header('Location: index.php?page=administration&section=customers&action=createCustomer&validation=ok');
                    }
                }
                catch(Exception $e)
                {
                    throw new Exception('Erreur = '.$e->getMessage());
                }
                
            }
        }
        require_once('views/backend/administration/customers/createCustomer.php');
    }
    catch(Exception $e)
    {
        throw new Exception('Erreur = '.$e->getMessage());
    }
    
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

function deleteCustomer($id)
{
    $delete = new Customers();
    $deleteCustomer = $delete->deleteTheCustomer($id);
    require('views/frontend/administration/customers/listCustomers.php');
}