<?php
    session_start();
    require_once('./model/login.php');

    if (isset($_POST['password']) && $_POST['username'])
    {
        if (user_check($_POST['password'] ,$_POST['username']))
        {
            //echo 'connecté';

            $client = user_info($_POST['username']);

            foreach(array('id_user','prenom','nom','identifiant','mail','role') as $key )
            {
                $_SESSION[$key] = $client[$key];
            }
            $_POST['mdr']= 'lol';
            header('Location:index.php');
        }
    }

    $page_css = "\"./public/style_login.css\"";
    $title = "login";

    $content="";
    require_once('./view/login.php');
?>    
