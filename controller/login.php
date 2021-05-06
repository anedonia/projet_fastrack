<?php

    require_once('./model/login.php');

    if (isset($_GET['password']) && $_GET['username'])
    {
        if (user_check($_GET['password'] ,$_GET['username']))
        {
            //echo 'connecté';

            $client = user_info($_GET['username']);

            foreach(array('id_user','prenom','nom','identifiant','mail','role') as $key )
            {
                $_SESSION[$key] = $client[$key];
            }
            
            header('Location: index.php?action=accueil');
            exit();
        }
    }

    $page_css = "\"./public/style_login.css\"";
    $title = "login";

    $content="";
    require_once('./view/login.php');
?>    
