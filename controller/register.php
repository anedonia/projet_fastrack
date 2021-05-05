<?php

if(!empty($_POST['password']) AND !empty($_POST['username'])){
    print_r($_POST);
    require('model\register.php');
    if(empty(bdd("SELECT `id_user` FROM `user`"))){
        $id_client = 0;
        echo 'bite';
    }else{
        $id = bdd("SELECT `id_user` FROM `user`");
        $id_client = intval($id[count($id)-1]['id_user']+1);
        echo 'bite2';
    }
    var_dump(bdd("SELECT `id_user` FROM `user`"));
    bdd("INSERT INTO `user` (`id_user`, `prenom`, `nom`, `identifiant`, `mdp`, `mail`, `role`) VALUES (".$id_client.", '".$_POST['first_name']."', '".$_POST['full_name']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', NULL);");
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