<?php

if(!empty($_POST['password']) AND !empty($_POST['username'])){
    print_r($_POST);
    require('model\register.php');
    var_dump(bdd("SELECT `id_user` FROM `user`"));
    bdd("INSERT INTO `user` (`id_user`, `prenom`, `nom`, `identifiant`, `mdp`, `mail`, `role`) VALUES (NULL, '".$_POST['first_name']."', '".$_POST['full_name']."', '".$_POST['username']."', '".sha1($_POST['password'])."', '".$_POST['email']."', NULL);");
    $_POST['action'] = '';
    setcookie("account_created", True, time()+20);
    header('Location: index.php');
    exit();
}
else{
    require('model\register.php');
    print_r($_POST);
    $page_css = "\"./public/style_login.css\"";
    $title = "register";
    ob_start();
    $content = ob_get_clean();
    require('view\register.php');
}

?>