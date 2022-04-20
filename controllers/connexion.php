<?php require('models/Connexion.php');

function connexion()
{
    require_once('views/frontend/connexion/connexion.php');
}

function login()
{    
    if(isset($_POST['mailConnection']))
    {   
        if(empty($_POST['mailConnection']) && empty($_POST['passwordConnection']))
        { 
            header('Location: index.php?page=connexion&err=both');
        }
        elseif(empty($_POST['passwordConnection']))
        {
            header('Location: index.php?page=connexion&err=password');
        }
        elseif(empty($_POST['mailConnection']) )
        {
            header('Location: index.php?page=connexion&err=mail');
        }
        else
        {
            if (!filter_var($_POST["mailConnection"], FILTER_VALIDATE_EMAIL)) 
            {
                header('Location: index.php?page=connexion&err=wrongmail');
            }
            else
            {
                try{
                    
                    $mail = htmlspecialchars($_POST['mailConnection']);
                    $password = htmlspecialchars($_POST['passwordConnection']);
                    $password = md5($password);
                    
                    $loginSite = new Connexion;
                    $allUsers = $loginSite->loginSite($mail, $password);
                    $countUser = count($allUsers);
                    echo $countUser;


                    if($countUser <= 0)
                    {   
                        header('Location: index.php?page=connexion&err=wronguser');
                    }
                    else
                    {           
                            
                        try 
                        {
                            foreach ($allUsers as $user)
                            {
                                $_SESSION['userAdmin'] = $user['firstname'];
                                $_SESSION['typeAdmin'] = $user['typeAdmin'];
                            }

                            if(isset($_SESSION['userAdmin']))
                            {
                                header('Location: index.php?page=administration&section=gestion');
                            }
                        }
                        catch(Exception $error)
                        {
                            throw new Exception('Erreur = '.$error->getMessage());
                        }

                    }
                }
                catch(Exception $e)
                {
                    throw new Exception('Erreur = '.$e->getMessage());
                }
            }
           
        }
    }
    
}