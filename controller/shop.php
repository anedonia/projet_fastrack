<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require('.\model\shop.php');
$page_css = "\"./public/style_shop.css\"";
$title = "Shop";
//echo affichage_items(8, 'lunedefiel', 99.99, "la baise");

ob_start();
    echo affichage_items(7, 'lunedefiel', '99.99', 'la baise');
    echo affichage_items(8, 'lunedefiel', '99.99', 'la baise');
$content = ob_get_clean();

require('.\view\shop.php');

?>