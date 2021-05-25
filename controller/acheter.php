<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}

require_once('./model/voir_cart.php');
require_once('modules/module_cart.php');
require_once('./model/acheter.php');
require_once('modules/module_acheter.php');
require_once('modules/module_acheter_regex.php');

$cart = formulation_cart($_SESSION['id_user']);

 



$jour_mois = date("m.d.y");
$heure = date("H:i");

$page_css = "\"./public/style_profil.css\"";
$title = "Cart";
$err = "";


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

//print_r($_POST);
//conditions d'achats et actions d'achat
if (isset($_POST['confirmation']))
{
    //si une commande est en cours
    if(null !== (commande_existe($_SESSION['id_user'])))
    {
        if (paiment_is_full($_POST) && check_register_info())  
        {
            update_commande(commande_nb($_SESSION['id_user']),total_com(commande_nb($_SESSION['id_user'])),cryptage_info_paiement());
            unset($_POST['confirmation']);
            $_GET['achat_done']="yes";
        }
        if (!paiment_is_full($_POST))
        {
            $err = "<li> Les informations ne sont pas complètes </li>";
        }
        else 
        {
            $err = err_to_string($_GET['err']);
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