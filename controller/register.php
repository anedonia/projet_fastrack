<?php
require_once('modules/module_register.php');
require('model\register.php');

//https://youtu.be/GXMLyRyvixQ
if(!empty($_GET['password']) AND !empty($_GET['username'])){
    
    $page_css = "\"./public/style_login.css\"";
    $title = "register";



    //je convertis les info du form en tab assoc simple d'usage
    $client = [];
    foreach(array('first_name','full_name','username','email','password') as $key )
    {
        $client[$key] = $_GET[$key];
    }

    //si toutes les conditions sont repectées alors on ajoute le user 
    if (check_register_info($client))
    {
        $err = "";
        bdd("INSERT INTO `user` (`id_user`, `prenom`, `nom`, `identifiant`, `mdp`, `mail`, `role`) VALUES (NULL, '".$_GET['first_name']."', '".$_GET['full_name']."', '".$_GET['username']."', '".sha1($_GET['password'])."', '".$_GET['email']."', 'client');");
        setcookie('account_created', True, time()+20);
        header('Location: index.php');
    }
    
    //sinon on lui indique les champs à changer
    else 
    {
        $err = err_to_string($_GET['err']);
        require('view\register.php');
    }
    
    
}
else{
    $page_css = "\"./public/style_login.css\"";
    $title = "register";
    $err = "";
    
    require('view\register.php');
}

?>