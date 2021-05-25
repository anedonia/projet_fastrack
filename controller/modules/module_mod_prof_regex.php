<?php

function check_register_info($client)
{
    $_GET['err']=[];

    if (empty($client))
    {
        array_push($_GET['err'], 'Aucune modif demandée');
        return false;
    }

    
    if(!empty($client['prenom'])) 
    {
        check_name($client['prenom']);
    }

    if(!empty($client['nom'])) 
    {
        check_name($client['nom']);
    }

    if(!empty($client['identifiant'])) 
    {
        check_username($client['identifiant']);
    }
    
    if(!empty($client['mail'])) 
    {
        check_mail($client['mail']);
    }
    
    if(!empty($client['mdp']))
    {
        check_password($client['mdp']);
    }
    

    if (!empty($_GET['err']))
    {
        return false;
    }
    else 
    {
        return true;
    }
}

function check_name($username)
{
    $username = trim($username);
    $username = htmlspecialchars($username);

    if (empty($username)) 
    {
        array_push($_GET['err'], 'Le nom est vide');
        
    }
    elseif (strlen($username) <= 2) 
    {
        array_push($_GET['err'], 'Le nom est trop court');
    }
    elseif (strlen($username) >= 20 ) 
    {
        array_push($_GET['err'], 'Le nom est trop court');
    }
    elseif (!preg_match('/[a-z]/', $username)) 
    {
        array_push($_GET['err'], 'Le nom doit contenir deux lettres');
    }
    elseif (preg_match('/[^a-zA-Z-\s]/', $username)) 
    {
        array_push($_GET['err'], 'Un caractère non valide à été utilisé (nom/prenom)');
    }
    
}

function check_username($username)
{
    $username = trim($username);
    $username = htmlspecialchars($username);


    if (empty($username)) 
    {
        array_push($_GET['err'], 'Le nom d\'utilisation est vide');
        
    }
    elseif (strlen($username) <= 7) 
    {
        array_push($_GET['err'], 'Le nom d\'utilisation est trop court');
    }
    elseif (strlen($username) >= 20 ) 
    {
        array_push($_GET['err'], 'Le nom d\'utilisation est trop court');
    }
    elseif (!preg_match('/[a-z]/', $username)) 
    {
        array_push($_GET['err'], 'Le nom d\'utilisation doit contenir une lettre');
    }
    elseif (!preg_match('/[A-Z]/', $username)) 
    {
        array_push($_GET['err'], 'Le nom d\'utilisation doit contenir une lettre majuscule');
    }
    elseif (!preg_match('/[0-9]/', $username)) 
    {
        array_push($_GET['err'], 'Le nom d\'utilisation doit contenir un chiffre');
    }
    elseif (preg_match('/[^a-zA-Z0-9]/', $username)) 
    {
        array_push($_GET['err'], 'Un caractère non valide à été utilisé (nom d\'utilisation)');
    }
    id_unique($username);
    
}

function check_password($password)
{
    
    $password = trim($password);
    $password = htmlspecialchars($password);


    if (empty($password)) 
    {
        array_push($_GET['err'], 'Le mot de passe est vide');
        
    }
    elseif (strlen($password) <= 7) 
    {
        array_push($_GET['err'], 'Le mot de passe est trop court');
    }
    elseif (strlen($password) >= 32 ) 
    {
        array_push($_GET['err'], 'Le mot de passe est trop court');
    }
    elseif (!preg_match('/[a-z]/', $password)) 
    {
        array_push($_GET['err'], 'Le mot de passe doit contenir une lettre');
    }
    elseif (!preg_match('/[A-Z]/', $password)) 
    {
        array_push($_GET['err'], 'Le mot de passe doit contenir une lettre majuscule');
    }
    elseif (!preg_match('/[0-9]/', $password)) 
    {
        array_push($_GET['err'], 'Le mot de passe doit contenir un chiffre');
    }
    elseif (!preg_match('/[\W]/', $password)) 
    {
        array_push($_GET['err'], 'Le mot de passe doit contenir un symbole');
    }
    elseif (substr_count($password, " ") !== 0 ) 
    {
        array_push($_GET['err'], 'Le mot de passe ne peut pas avoir d\'espace');
    }
    
}

function check_mail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        //
    }
    else
    {
       array_push($_GET['err'],'L\'adresse email est considérée comme invalide');
    }
}

function err_to_string($errs)
{
    $tab_html = [];

    array_push($tab_html, "<div id=\"box1\">");

    foreach($errs as $x => $err  ) 
    {
        array_push($tab_html,"<li>" . $err . "</li>");
    }
    array_push($tab_html,"</div>");

    return implode($tab_html);
}