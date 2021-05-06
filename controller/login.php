<?php

    require('./model/login.php');

    if (isset($_POST['password']) && $_POST['username'])
    {
        if (user_check($_POST['password'] ,$_POST['username']))
        {
            echo 'connecté';

            $client = user_info($_POST['username']);

            foreach(array('id_user','prenom','nom','identifiant','mail','role') as $key )
            {
                $_SESSION[$key] = $client[$key];
            }

            print_r($_SESSION);
        }
    }
    
    $page_css = "\"./public/style_login.css\"";
    $title = "login";

    ob_start();
   
    $content = ob_get_clean();

    $content = "";
    require('./view/login.php');
?>    
    