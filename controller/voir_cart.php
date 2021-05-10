<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require_once('./model/voir_cart.php');


$jour_mois = date("m.d.y");
$heure = date("H:i");

$page_css = "\"./public/style_profil.css\"";
$title = "Cart";

ob_start();
//ici
$content = ob_get_clean();
$cart = formulation_cart($_SESSION['id_user']);
print_r($cart);
require('.\view\voir_cart.php');

?>