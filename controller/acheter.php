<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}

require_once('./model/voir_cart.php');
require_once('modules/module_cart.php');
require_once('./model/acheter.php');
require_once('modules/module_acheter.php');

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



//conditions d'achats et actions d'achat
if (isset($_GET['confirmation']))
{
    //si une commande est en cours
    if(null !== (commande_existe($_SESSION['id_user'])))
    {
        if (paiment_is_full($_GET))
        {
            //cryptage_info_paiement($_GET);
            update_commande(commande_nb($_SESSION['id_user']),total_com(commande_nb($_SESSION['id_user'])),cryptage_info_paiement($_GET));
            unset($_GET['confirmation']);
            $_GET['achat_done']="yes";
        }
        else 
        {
            //gérer l'erreur du manque d'informations de paiement 
            //echo "j'ai pas toutes les infos";
        }
    }
    else 
    {

        $html_cart ="<p class = \"center_container\"> une commande doit exister pour faire un achat</p>";
    }
}


if (isset($_GET['achat_done']))
{
    $html_cart = "<p class = \"center_container\"> Merci de votre confiance nous traitons votre commande dans les plus brefs délais</p>";
    unset($_GET['achat_done']);
}
elseif(isset($html_cart))
{
    //
}
else
{
    $html_cart = show_cart($cart);
}

require('.\view\acheter.php');
?>