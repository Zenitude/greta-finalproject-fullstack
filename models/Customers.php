<?php

require_once('DataBase.php');

class Customers extends DataBase
{
    function listCustomers()
    {
        try
        {
            $db = $this->dbConnect();
            $requestListCustomers = "SELECT * FROM customers LEFT JOIN addresscustomers ON customers.idAddressC = addresscustomers.idAddress";
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

    function searchCustomer($selectSearch, $search)
    {
        switch($selectSearch)
        {
            case 'id':
                $search = intval($search);
                break;
            case 'lastname' :
                $search = strval($search);
                break;
            case 'firstname' :
                $search = strval($search);
                break;
            case 'zipCode' :
                $search = intval($search);
                break;
            case 'city' :
                $search = strval($search);
                break;
            case 'vip' :
                $search = strval($search);
                break;
        }

        if($selectSearch == 'vip')
        {
            if($search == 'oui')
            {
                $search = 1;
            }
            else
            {
                $search = 0;
            }
        }
        var_dump('select : '.$selectSearch);
        var_dump('search : '.$search);

        $db = $this->dbConnect();
        $requestSearchCustomer = "SELECT * FROM customers
                                  JOIN addresscustomers ON customers.idAddressC = addresscustomers.idAddress
                                  WHERE `".$selectSearch."` LIKE ". $search;
        $searchCustomer = $db->prepare($requestSearchCustomer);
        $searchCustomer->execute();
        $search = $searchCustomer->fetchAll();
        return $search;
    }

    function listCustomer($id)
    {
        $db = $this->dbConnect();
        $requestListCustomer = "SELECT lastname, firstname FROM customers WHERE id = :id";
        $listCustomer = $db->prepare($requestListCustomer);
        $listCustomer->bindParam(':id', $id);
        $listCustomer->execute();
        $customer = $listCustomer->fetch();
        return $customer;
    }
    
    function numberReservation($id)
    {
        $db = $this->dbConnect();
        $requestNumberReservations = "SELECT * FROM reservationshotel WHERE idCustomer = :idCustomer";
        $numberReservations = $db->prepare($requestNumberReservations);
        $numberReservations->bindParam(':idCustomer', $id);
        $numberReservations->execute();
        $reservations = $numberReservations->fetchAll();

        return $reservations;
    }

    function addCustomer($lastname, $firstname, $mail, $phone, $birthDate, $street, $zipCode, $city, $vip, $idConjoint)
    {

        /*var_dump('C-nom : '.$lastname);
        var_dump('C-prenom : '.$firstname);
        var_dump('C-mail : '.$mail);
        var_dump('C-phone : '.$phone);
        var_dump('C-date : '.$birthDate);
        var_dump('C-rue : '.$street);
        var_dump('C-cp : '.$zipCode);
        var_dump('C-ville : '.$city);
        var_dump('C-conjoint : '.$idConjoint);
        var_dump('C-vip : '.$vip);*/

        try{

            $db = $this->dbConnect();
            $requestSearchCustomer = "SELECT * FROM customers WHERE lastname = :lastname AND firstname = :firstname AND birthdate = :birthDate AND mail = :mail";
            $searchCustomer = $db->prepare($requestSearchCustomer);
            $searchCustomer->bindParam(':lastname', $lastname);
            $searchCustomer->bindParam(':firstname', $firstname);
            $searchCustomer->bindParam(':birthDate', $birthDate);
            $searchCustomer->bindParam(':mail', $mail);
            $searchCustomer->execute();
            $customerSearch = $searchCustomer->fetchAll();
            $countCustomer = count($customerSearch);

            if($countCustomer > 0)
            {
                header('Location: index.php?page=administration&section=customers&action=createCustomer&err=customerExist');
            }
            else
            {
                try
                {
                    $requestSearchAddress = "SELECT * FROM addresscustomers WHERE street = :street AND zipCode = :zipCode AND city = :city";
                    $searchAddressCustomers = $db->prepare($requestSearchAddress);
                    $searchAddressCustomers->bindParam(':street', $street);
                    $searchAddressCustomers->bindParam(':zipCode', $zipCode);
                    $searchAddressCustomers->bindParam(':city', $city);
                    $searchAddressCustomers->execute();
                    $searchAddress = $searchAddressCustomers->fetchAll();
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

                    try
                    {
                        $requestSelectAddress = "SELECT * FROM addresscustomers WHERE street = :street AND zipCode = :zipCode AND city = :city";
                        $selectAddress = $db->prepare($requestSelectAddress);
                        $selectAddress->bindParam(':street', $street);
                        $selectAddress->bindParam(':zipCode', $zipCode);
                        $selectAddress->bindParam(':city', $city);
                        $selectAddress->execute();
                        $idAddressSelected = $selectAddress->fetchAll();

                        try
                        {
                            $requestAddCustomer = "INSERT INTO customers(lastname, firstname, mail, phone, birthdate, idAddressC, vip, idConjoint) 
                                                   VALUES(:lastname, :firstname, :mail, :phone, :birthdate, :idAddress, :vip, :idConjoint)";
                            $addCustomer = $db->prepare($requestAddCustomer);
                            $addCustomer->bindParam(':lastname', $lastname);
                            $addCustomer->bindParam(':firstname', $firstname);
                            $addCustomer->bindParam(':mail', $mail);
                            $addCustomer->bindParam(':phone', $phone);
                            $addCustomer->bindParam(':birthdate', $birthDate);
                            $addCustomer->bindParam(':idAddress', $idAddressSelected[0]['idAddress']);
                            $addCustomer->bindParam(':vip', $vip);
                            $addCustomer->bindParam(':idConjoint', $idConjoint);
                            $addCustomer->execute();
                            
                        }
                        catch(Exception $e)
                        {
                            throw new Exception('ErreurAddCustomer = '.$e->getMessage());
                        }
                    }
                    catch(Exception $e)
                    {
                        throw new Exception('ErreurSelectIdAddress = '.$e->getMessage());
                    }
                }
                catch(Exception $e)
                {
                    throw new Exception('Erreur = '.$e->getMessage());
                }
            } 
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }

    function selectTheAddress()
    {
        $db = $this->dbConnect();
        $requestSelectAddress = "SELECT * FROM addresscustomers ORDER BY zipCode, city";
        $selectAddress = $db->prepare($requestSelectAddress);
        $selectAddress->execute();
        $address = $selectAddress->fetchAll();
        return $address;
    }

    function updateACustomer()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $db = $this->dbConnect();
            $requestDetailsCustomer = 'SELECT * FROM customers WHERE id = :id';
            $detailsCustomer = $db->prepare($requestDetailsCustomer);
            $detailsCustomer->bindParam(':id', $id);
            $detailsCustomer->execute();
            $customer = $detailsCustomer->fetch();
            return $customer;
        }
    }

    function updateCustomer($id, $lastname, $firstname, $mail, $phone, $birthdate, $idAddress, $idConjoint)
    {

        /*var_dump('C-id : '.$id);
        var_dump('C-nom : '.$lastname);
        var_dump('C-prenom : '.$firstname);
        var_dump('C-mail : '.$mail);
        var_dump('C-telephone : '.$phone);
        var_dump('C-date : '.$birthdate);
        var_dump('C-idAddress : '.$idAddress);
        var_dump('C-idConjoint : '.$idConjoint);*/

        try{
            
            $db = $this->dbConnect();

            $requestUpdateCustomer = "UPDATE customers
                                      SET lastname = :lastname, firstname = :firstname, mail = :mail, 
                                      phone = :phone, birthdate = :birthdate, vip = :vip, 
                                      idConjoint = :idConjoint, idAddressC = :idAddress
                                      WHERE customers.id = :idCustomer";
            $updateCustomer = $db->prepare($requestUpdateCustomer);
            $updateCustomer->bindParam(':lastname', $lastname);
            $updateCustomer->bindParam(':firstname', $firstname);
            $updateCustomer->bindParam(':mail', $mail);
            $updateCustomer->bindParam(':phone', $phone);
            $updateCustomer->bindParam(':birthdate', $birthdate);
            $updateCustomer->bindParam(':vip', $vip);
            $updateCustomer->bindParam(':idConjoint', $idConjoint);
            $updateCustomer->bindParam(':idAddress', $idAddress);
            $updateCustomer->bindParam(':idCustomer', $id);
            $updateCustomer->execute();
            
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur = '.$e->getMessage());
        }
    }

    function selectTheCutomers()
    {
        $db= $this->dbConnect();
        $requestSelectCustomers = "SELECT id, lastname, firstname FROM customers";
        $selectTheCustomers = $db->prepare($requestSelectCustomers);
        $selectTheCustomers->execute();
        $selectCustomers = $selectTheCustomers->fetchAll();
        return $selectCustomers;
    }

    function deleteTheCustomer($id)
    {
        $db = $this->dbConnect();
        $requestDeleteCustomer = "DELETE FROM customers WHERE id = :id";
        $deleteCustomer = $db->prepare($requestDeleteCustomer);
        $deleteCustomer->bindParam(':id', $id);
        $deleteCustomer->execute();

    }
}