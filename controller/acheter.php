<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require('.\model\acheter.php');
$page_css = "\"./public/style_profil.css\"";
$title = "Buy";




require('.\view\acheter.php');

?>