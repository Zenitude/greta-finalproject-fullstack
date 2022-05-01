<?php

require_once('DataBase.php');

class Customers extends DataBase
{
    function listCustomer()
    {
        try
        {
            $db = $this->dbConnect();
            $requestListCustomers = "SELECT * FROM customers JOIN addresscustomers ON customers.idAddress = addresscustomers.id";
            $ListCustomers = $db->prepare($requestListCustomers);
            $ListCustomers->execute();
            $customers = $ListCustomers->fetchAll();
            
            return $customers;
            
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }
    
    function numberReservation($id)
    {
        $db = $this->dbConnect();
        $requestNumberReservations = "SELECT * FROM reservationshotel WHERE idCustomer = :idCustomer";
        $numberReservations = $db->prepare($requestNumberReservations);
        $numberReservations->bindParam(':idCustomer', $id);
        $numberReservations->execute();

        return $numberReservations;
    }

    function addCustomer($lastname, $firstname, $mail, $phone, $birthDate, $street, $zipCode, $city, $vip, $idConjoint)
    {
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

        try{
            $db = $this->dbConnect();
            $requestSearchCustomer = "SELECT * FROM customers WHERE lastname = :lastname AND firstname = :firstname AND birthDate = :birthDate AND mail = :mail";
            $searchCustomer = $db->prepare($requestSearchCustomer);
            $searchCustomer->bindParam(':lastname', $lastname);
            $searchCustomer->bindParam(':firstname', $firstname);
            $searchCustomer->bindParam(':birthDate', $birthDate);
            $searchCustomer->bindParam(':mail', $mail);
            $searchCustomer->execute();
            $customer = $searchCustomer->fetch();
            $countCustomer = count($customer);

            if($countCustomer > 0)
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=customerExist');
            }
            else
            {
                $requestSearchAddress = "SELECT * FROM addresscustomers WHERE street = :street AND zipCode = :zipCode AND city = :city)";
                $searchAddressCustomers = $db->prepare($requestSearchAddress);
                $searchAddressCustomers->bindParam(':street', $street);
                $searchAddressCustomers->bindParam(':zipCode', $zipCode);
                $searchAddressCustomers->bindParam(':city', $city);

                if($searchAddressCustomers->execute())
                {
                    $searchAddress = $searchAddressCustomers->fetch();
                    $countAddress = count($searchAddress);

                    if($countAddress <= 0)
                    {
                        $requestAddAddress = "INSERT INTO addresscustomers(street, zipCode, city) VALUES(:street, :zipCode, :city)";
                        $addAddressCustomers = $db->prepare($requestAddAddress);
                        $addAddressCustomers->bindParam(':street', $street);
                        $addAddressCustomers->bindParam(':zipCode', $zipCode);
                        $addAddressCustomers->bindParam(':city', $city);
                        $addAddressCustomers->execute();
                    }
                }

                $requestSelectAddress = "SELECT id FROM addresscustomers WHERE street = :street AND zipCode = :zipCode AND city = :city";
                $selectAddress = $db->prepare($requestSelectAddress);
                $selectAddress->bindParam(':street', $street);
                $selectAddress->bindParam(':zipCode', $zipCode);
                $selectAddress->bindParam(':city', $city);
                $idAddress = $selectAddress->fetch();

                $requestAddCustomer = "INSERT INTO customers(lastname, firstname, mail, phone, birthdate, idAddress, vip, idConjoint) VALUES(:lastname, :firstname, :mail, :phone, :birthdate, :idAddress, :vip, :idConjoint)";
                $addCustomer = $db->prepare($requestAddCustomer);
                $addCustomer->bindParam(':lastname', $lastname);
                $addCustomer->bindParam(':firstname', $firstname);
                $addCustomer->bindParam(':mail', $mail);
                $addCustomer->bindParam(':phone', $phone);
                $addCustomer->bindParam(':birthDate', $birthDate);
                $addCustomer->bindParam(':idAddress', $idAddress);
                $addCustomer->bindParam(':vip', $vip);
                $addCustomer->bindParam(':idConjoint', $idConjoint);
                
                if($addCustomer->execute())
                {
                    header('Location: index.php?page=administration&section=customers&action=createCustomer&err=customerAdd');
                }
            } 
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }

    function deleteTheCustomer($id)
    {
        $db = $this->dbConnect();
        $requestDeleteCustomer = "DELETE FROM customers WHERE id = :id";
        $deleteCustomer = $db->prepare($requestDeleteCustomer);
        $deleteCustomer->bindParam(':id', $id);
        $deleteCustomer->execute();

        return $deleteCustomer;

    }
}