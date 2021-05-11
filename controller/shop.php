<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require('.\model\shop.php');
$page_css = "\"./public/style_shop.css\"";
$title = "Shop";
//echo affichage_items(8, 'lunedefiel', 99.99, "la baise");

$stock = bdd('SELECT * FROM `stock`');

ob_start();

foreach ($stock as $track){
    echo affichage_item($track['id_musique'], $track['titre'], $track['prix'], $track['description']);
}

$content = ob_get_clean();
require('.\view\shop.php');

?>