<?php

    include('./model/login.php');

    if (isset($_POST['mdp']) && $_POST['identifiant'])
    {
        user_check($_POST['mdp'] ,$_POST['identifiant']);
    }
    
    $page_css = "\"./public/style_login.css\"";
    $title = "login";

    ob_start();
   
    $content = ob_get_clean();

    $content = "bite";
    require('./view/login.php');
?>    
    