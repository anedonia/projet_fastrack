<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require('.\model\modifier_profil.php');
require('modules\module_modifier_profil.php');
$page_css = "\"./public/style_profil.css\"";
$title = "account";
$jour_mois = date("m.d.y");
$heure = date("H:i");

//avant coo
if (empty($_COOKIE['auth'])){
    $vpseudo = select_user('identifiant')[0][0];
    $vmdp = select_user('mdp')[0][0];
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        if($_POST['pseudo'] == $vpseudo && sha1($_POST['mdp']) == $vmdp){
            setcookie('auth', True, time()+180);
        }
        header('Location: index.php?action=modifier_profil');
        exit();
    }else{
        ob_start();
        affichage_connexion();
        $content = ob_get_clean();
    }
}else{
//apres connexion
    $prenom = select_user('prenom')['0']['0'];
    $nom = select_user('nom')['0']['0'];
    $identifiant = select_user('identifiant')['0']['0'];
    $mdp = '******';
    $mail = select_user('mail')['0']['0'];
    if (!empty($_POST)){
        foreach ($_POST as $key => $value) {
            if($value !== ''){
                if ($key === 'mdp'){
                    update_user($key, sha1($value));
                    header('Location: index.php?action=modifier_profil');
                    exit();
                }else{
                    update_user($key, $value);
                    header('Location: index.php?action=modifier_profil');
                    exit();
                }
            }
        }
    }
ob_start();
affichage_modif($prenom, $nom, $identifiant, $mdp, $mail);
$content = ob_get_clean();
}

//  update(structure, nouvelle value)
//update_user('prenom', 'robin');
require('.\view\modifier_profil.php');
?>