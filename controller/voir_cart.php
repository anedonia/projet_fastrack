<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require_once('./model/voir_cart.php');
require_once('modules/module_cart.php');

$cart = formulation_cart($_SESSION['id_user']);

//c'est ultra buggé ne pas toucher 



$jour_mois = date("m.d.y");
$heure = date("H:i");

$page_css = "\"./public/style_profil.css\"";
$title = "Cart";



//boutons supplémentaires pour le vendeur
ob_start();
?>
<form id="voir_vente" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="voir_vente"/>
                </form>
                <a href='#' onclick='document.getElementById("voir_vente").submit()'>Ventes</a>

                <form id="mettre_en_vente" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="mettre_en_vente"/>
                </form>
                <a href='#' onclick='document.getElementById("Upload").submit()'>Upload</a>
<?php
$content = ob_get_clean();
if ($_SESSION['role'] !== "vendeur")
{
    $content = "";
}


$html_cart = show_cart($cart);

require('.\view\voir_cart.php');

