<?php

if(!empty($_GET['password']) AND !empty($_GET['username'])){
    require('model\register.php');
    $prenom = 'antonin';
    bdd("INSERT INTO `user` (`id_user`, `prenom`, `nom`, `identifiant`, `mdp`, `mail`, `role`) VALUES (NULL, '".$_GET['first_name']."', '".$_GET['full_name']."', '".$_GET['username']."', '".sha1($_GET['password'])."', '".$_GET['email']."', 'client');");
    setcookie('account_created', True, time()+20);
    header('Location: index.php');
    exit();
}
else{
    require('model\register.php');
    $page_css = "\"./public/style_login.css\"";
    $title = "register";
    ob_start();
    $content = ob_get_clean();
    require('view\register.php');
}

?>