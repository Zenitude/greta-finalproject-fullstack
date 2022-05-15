<?php require('models/Connexion.php');

function connexion()
{
    require_once('views/connexion/connexion.php');
}

function login()
{    
    if(isset($_GET['err']))
    {
        switch($_GET['err'])
        {
            case 'both':
                $errorIdentify = '<span class="text-danger ps-3"> Le champ Mail est vide ! </span>';
                $errorPassword = '<span class="text-danger ps-3"> Le champ Mot de passe est vide ! </span>';
                break;
            case 'mail':
                $errorIdentify = '<span class="text-danger ps-3"> Le champ Mail est vide !</span>';
                break;
            case 'password':
                $errorPassword = '<span class="text-danger ps-3"> Le champ Mot de passe est vide ! </span>';
                break;
            case 'wrongmail':
                $errorIdentify = '<span class="text-danger ps-3"> Email invalide !</span>';
                break;
            case 'wronguser':
                $errorUser = '<p class="bg-danger text-light text-center"> Utilisateur introuvable ! </p>';
                break;
            default :
                $errorIdentify = '';
                $errorPassword = '';
                $errorUser = '';
        }
    }
    
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
   
                    $loginBD = new Connexion;
                    $user = $loginBD->loginSite($mail, $password);
                    $countUser = count($user);                   

                    if($countUser <= 0)
                    {   
                        header('Location: index.php?page=connexion&err=wronguser');
                    }
                    else
                    {         
                            
                        try 
                        {
                            if($user)
                            {
                                $_SESSION['userAdmin'] = $user['firstname'];
                                $_SESSION['typeAdmin'] = $user['typeAdmin'];
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
    require_once('views/connexion/connexion.php');
    
}

function deconnexion()
{
    $deco = new Connexion;
    $decoSite = $deco->deconnectSite();
    return $decoSite;
}