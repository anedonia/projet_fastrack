<?php

    require('./model/login.php');

    if (isset($_POST['password']) && $_POST['username'])
    {
        if (user_check($_POST['password'] ,$_POST['username']))
        {
            echo 'connecté';
        }
    }
    
    $page_css = "\"./public/style_login.css\"";
    $title = "login";

    ob_start();
   
    $content = ob_get_clean();

    $content = "";
    require('./view/login.php');
?>    
    