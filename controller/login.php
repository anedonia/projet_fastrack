<?php

    require('./model/login.php');

    if (isset($_POST['password']) && $_POST['username'])
    {
        //echo 'pénétration';
        user_check($_POST['password'] ,$_POST['username']);
    }
    
    $page_css = "\"./public/style_login.css\"";
    $title = "login";

    ob_start();
   
    $content = ob_get_clean();

    $content = "";
    require('./view/login.php');
?>    
    