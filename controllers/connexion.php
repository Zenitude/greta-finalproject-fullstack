<?php require('models/Connexion.php');


function connexion()
{
    require_once('views/frontend/connexion/connexion.php');
}

function login()
{
    $errorUser = '';
    $errorIdentify = '';
    $errorPassword = '';
    
    if(isset($_POST['mailConnection']))
    {
        if(empty($_POST['mailConnection']))
        {
            $errorIdentify = '<span class="text-danger"> Veuillez saisir votre identifiant !</span>';
            require_once('views/frontend/connexion/connexion.php');
        }
        elseif(empty($_POST['passwordConnection']))
        {
            $errorPassword = '<span class="text-danger"> Veuillez saisir votre mot de passe ! </span>';
            require_once('views/frontend/connexion/connexion.php');
        }
        elseif(empty($_POST['mailConnection']) && empty($_POST['passwordConnection']))
        {
            $errorIdentify = '<span class="text-danger"> Veuillez saisir votre identifiant ! </span>';
            $errorPassword = '<span class="text-danger"> Veuillez saisir votre mot de passe ! </span>';
            require_once('views/frontend/connexion/connexion.php');
        }
        else
        {
            if (!filter_var($_POST["mailConnection"], FILTER_VALIDATE_EMAIL)) 
            {
                $errorIdentify = '<span class="text-danger"> Email invalide !</span>';
                
            }
            else
            {
                $loginSite = new Connexion;
                $allUsers = $loginSite->loginSite($_POST['mailConnection'], $_POST['passwordConnection']);
                $countUser = count($allUsers);
    
                if($countUser > 0)
                {
                    $errorUser = '';
                    $errorIdentify = '';
                    $errorPassword = '';
    
                    foreach ($allUsers as $user)
                    {
                        $_SESSION['userAdmin'] = $user['firstname'];
                        $_SESSION['typeAdmin'] = $user['typeAdmin'];
                    }
                    header('Location: index.php?page=administration&section=gestion');
                }
                else
                {
                    $errorUser = '<p class="bg-warning text-light text-center"> Utilisateur introuvable ! </p>';
                    require_once('views/frontend/connexion/connexion.php');
                   
                }
            }
           
        }
    }
}