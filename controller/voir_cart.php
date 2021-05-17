<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require_once('./model/voir_cart.php');
require_once('modules/module_cart.php');



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

//conditions de supression du panier (pas de la commande)
if(isset($_GET['vider']))
{
    //si une commande est en cours
    if(null !== (commande_existe($_SESSION['id_user'])))
    {
        vider_commande(commande_nb($_SESSION['id_user']));
        unset($_GET['vider']);
    }
    else 
    {
    // message erreur 
    }    
}

$cart = formulation_cart($_SESSION['id_user']);

$html_cart = show_cart($cart);

require('.\view\voir_cart.php');

