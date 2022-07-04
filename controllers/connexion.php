<?php 

/* Importing the Model | Import du Model */
require('models/Connexion.php');

/* Function displaying the login page | Fonction affichant la page de connexion */ 
function connexion()
{
    /* Importing the view | Import de la vue */
    require_once('views/connexion/connexion.php');
}

/* User login function | Fonction permettant à l'utilisateur de se connecter */
function login()
{    
    if(isset($_GET['err']))
    {
        /* Management of error messages to be displayed | Gestion des messages d'erreur à afficher */
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
    
    /*  When sending the form | Lors de l'envoie du formulaire */
    if(isset($_POST['mailConnection']))
    {   
        /* Redirects in case of error | Redirections en cas d'erreur */
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
            /* We check that this is an email | On vérifie qu'il s'agisse bien d'un email */
            if (!filter_var($_POST["mailConnection"], FILTER_VALIDATE_EMAIL)) 
            {
                header('Location: index.php?page=connexion&err=wrongmail');
            }
            else
            {
                /* We try to connect the user with the data entered | On tente de connecter l'utilisateur avec les données saisient */
                try{
                    
                    $mail = htmlspecialchars($_POST['mailConnection']);
                    $pass = htmlspecialchars($_POST['passwordConnection']);
   
                    $loginBD = new Connexion; // Initialize a new Connexion object | On initialise un nouveau objet Connexion
                    $user = $loginBD->loginSite($mail); // Use the loginSite method of the Connexion object | On fait appel à la méthode loginSite de l'objet Connexion 
                    $countUser = count($user); // Count the number of users found | On compte le nombre d'utilisateur trouvé

                    if($countUser <= 0)
                    {   
                        /*  If no matching user is redirected to the login page with an error message
                            Si aucun utilisateur ne correspond on redirige vers la page de connexion avec un message d'erreur */
                        header('Location: index.php?page=connexion&err=wronguser');
                    }
                    else
                    {         
                        /* If no error has been detected so far we connect the user | Si aucune erreur n'a été détecté jusque là on connecte l'utilisateur */    
                        try 
                        {
                            /*  If the user exists, we connect him
                                Si l'utilisateur existe, on vérifie son mot de passe */
                            if(password_verify($pass, $user['pass']))
                            {
                                /*  we save his username to say hello to him on the management page 
                                    On sauvegarde son identifiant pour lui dire bonjour sur la page de gestion */
                                $_SESSION['userAdmin'] = $user['firstname']; 

                                /*  And his type of authorisation to manage his access rights to certain contents
                                    Et son type d'habilitation pour gérer ses droits d'accès à certains contenus */
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

    /* Importing the view | Import de la vue */
    require_once('views/connexion/connexion.php');
    
}

/*  Function allowing the logged in user to log out | Fonction permettant à l'utilisateur connecté de se déconnecter */
function deconnexion()
{
    $deco = new Connexion; // Initialize a new Connexion object | On initialise un nouveau objet Connexion
    $decoSite = $deco->deconnectSite(); // Use the deconnectSite method of the Connexion object | On fait appel à la méthode deconnectSite de l'objet Connexion
    return $decoSite;
}
