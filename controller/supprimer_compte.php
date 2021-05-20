<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}

require('.\model\supprimer_compte.php');
require('modules\module_supprimer_compte.php');
$page_css = "";
$title = "supprimer_compte";
$page_css = "\"./public/style_profil.css\"";
$title = "account";
$jour_mois = date("m.d.y");
$heure = date("H:i");

//ici
if (empty($_COOKIE['suppr'])){
    $vpseudo = select_user('identifiant')[0][0];
    $vmdp = select_user('mdp')[0][0];
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        if($_POST['pseudo'] == $vpseudo && sha1($_POST['mdp']) == $vmdp){
            setcookie('suppr', True, time()+180);
            header('Location: index.php?action=supprimer_compte');
            exit();
        }
        ob_start();
        affichage_connexion();
        $content = ob_get_clean();
    }else{
        ob_start();
        affichage_connexion();
        $content = ob_get_clean();
    }
}else{
    if(empty($_POST['supprimer'])){
        ob_start();
        affichage_fin();
        $content = ob_get_clean();
    }else{
        ob_start();
        $content = ob_get_clean();
        $identifi = $_SESSION["id_user"];
        bdd('DELETE FROM `user` WHERE `user`.`id_user` = "'.$identifi.'";');
        setcookie('account_deleted', True, time()+20);
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
require('.\view\supprimer_compte.php');
?>