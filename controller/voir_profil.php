<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}

$page_css = "\"./public/style_profil.css\"";
$title = "account";
$jour_mois = date("m.d.y");

$heure = date("H:i");
                       

ob_start();
//ici
$content = ob_get_clean();
require('.\view\voir_profil.php');

?>