<?php

function check_register_info()
{
    $_GET['err']=[];
    //first let's check the last/first name 
    check_name($_POST['cardname']);
    check_card_number($_POST['cardnumber']);
    check_vcc($_POST['cvv']);
    check_exp_year($_POST['expyear']);
    check_exp_month($_POST['expmonth']);


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
    $username = strtoupper($username);
    
    if (empty($username)) 
    {
        array_push($_GET['err'], 'Le nom est vide');
        return;
    }
    elseif (strlen($username) <= 2 ) 
    {
        array_push($_GET['err'], 'Le nom est trop court');
    }
    elseif (strlen($username) >= 30 ) 
    {
        array_push($_GET['err'], 'Le nom est trop court');
    }
    elseif (!preg_match('/[A-Z]/', $username)) 
    {
        array_push($_GET['err'], 'Le nom doit contenir deux lettres');
    }
    elseif (preg_match('/[^a-zA-Z-\s]/', $username)) 
    {
        array_push($_GET['err'], 'Un caractère non valide à été utilisé (nom/prenom)');
    }
    
}


function check_card_number($card_num)
{   
    $card_num = trim($card_num);
    $card_num = htmlspecialchars($card_num);
    $card_num = explode(" ",$card_num);

    //on enleve les espaces en trop (s'il y en a)
    foreach($card_num as $key => $value)
    {
        if ($value == "")
        {
            unset($card_num[$key]);
        }
    }
    $card_num = implode($card_num);

    if (empty($card_num)) 
    {
        array_push($_GET['err'], 'Le numero de carte est vide');
        return;
    }
    elseif (strlen($card_num) !== 16) 
    {
        array_push($_GET['err'], 'Le numero de carte n\'est pas de taille correcte');
    }
    elseif (preg_match('/[^0-9]/', $card_num)) 
    {
        array_push($_GET['err'], 'Le numero de carte doit être uniquement composé de chiffres');
    }
}

function check_vcc($cvv)
{

    $cvv = trim($cvv);
    $cvv = htmlspecialchars($cvv);
    $cvv = explode(" ",$cvv);

    //on enleve les espaces en trop (s'il y en a)
    foreach($cvv as $key => $value)
    {
        if ($value == "")
        {
            unset($cvv[$key]);
        }
    }
    $cvv = implode($cvv);

    if (empty($cvv)) 
    {
        array_push($_GET['err'], 'Le CVV est vide');
        return;
    }
    elseif (strlen($cvv) !== 3 ) 
    {
        array_push($_GET['err'], 'Le CVV ne doit contenir que trois nombres');
    }
    elseif (preg_match('/[^0-9]/', $cvv)) 
    {
        array_push($_GET['err'], 'Le CVV ne peut être composé que de trois nombres');
    }
}

function check_exp_year($exp_year)
{

    $exp_year = trim($exp_year);
    $exp_year = htmlspecialchars($exp_year);
    $exp_year = explode(" ",$exp_year);

    //on enleve les espaces en trop (s'il y en a)
    foreach($exp_year as $key => $value)
    {
        if ($value == "")
        {
            unset($exp_year[$key]);
        }
    }
    $exp_year = implode($exp_year);

    if (empty($exp_year)) 
    {
        array_push($_GET['err'], 'La l\'année d\'expiration est vide');
        return;
    }
    elseif (strlen($exp_year) !== 4 ) 
    {
        array_push($_GET['err'], 'La l\'année d\'expiration ne doit contenir que quatre chiffres');
    }
    elseif (preg_match('/[^0-9]/', $exp_year)) 
    {
        array_push($_GET['err'], 'La l\'année d\'expiration ne peut être composé que de chiffres ');
    }
    elseif (intval($exp_year) < date('Y'))
    {
        array_push($_GET['err'], 'La l\'année d\'expiration ne peut être antérieure à notre année');
    }
}

function check_exp_month($exp_month)
{

    $exp_month = trim($exp_month);
    $exp_month = htmlspecialchars($exp_month);
    
    
    if (empty($exp_month)) 
    {
        array_push($_GET['err'], 'Le mois d\'expiration est vide');
        return;
    }
    elseif (strlen($exp_month) > 2 ) 
    {
        array_push($_GET['err'], 'Le mois d\'expiration ne doit contenir que un ou deux chiffres');
    }
    elseif (preg_match('/[^0-9]/', $exp_month)) 
    {
        array_push($_GET['err'], 'Le mois d\'expiration ne peut être composé que de chiffres');
    }
    elseif (intval($exp_month) > 12 || intval($exp_month) < 1)
    {
        array_push($_GET['err'], 'Le mois d\'expiration n\'est pas valide');
    }
    elseif (intval($exp_month) < date('m') && intval($_POST['expyear']) == date('Y') )
    {
        array_push($_GET['err'], 'Le mois d\'expiration n\'est pas valide');
    }
}


function err_to_string($errs)
{
    $tab_html = [];

    foreach($errs as $x => $err) 
    {
        array_push($tab_html,"<li>" . $err . "</li>");
    }

    return implode($tab_html);
}