<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require_once('./model/voir_vente.php');
require_once('modules/module_voir_vente.php');





$jour_mois = date("m.d.y");
$heure = date("H:i");

$page_css = "\"./public/style_profil.css\"";
$title = "Ventes";



//boutons supplémentaires pour le vendeur
ob_start();
?>
<form id="voir_vente" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="voir_vente"/>
                </form>
                <a href='#' onclick='document.getElementById("voir_vente").submit()'>Ventes</a>

                <form id="upload" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="upload"/>
                </form>
                <a href='#' onclick='document.getElementById("upload").submit()'>Upload</a>
<?php
$content = ob_get_clean();
if ($_SESSION['role'] !== "vendeur")
{
    $content = "";
}


$ventes = formulation_vente($_SESSION['id_user']);
$html_ventes = show_vente($ventes);

require('.\view\voir_vente.php');