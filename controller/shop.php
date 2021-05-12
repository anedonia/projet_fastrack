<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require('.\model\shop.php');
$page_css = "\"./public/style_shop.css\"";
$title = "Shop";
//echo affichage_items(8, 'lunedefiel', 99.99, "la baise");



//processus d'ajout au panier (loulou)
if(isset($_GET['ajout']))
{
    //si une commande est en cours
    if(null !== (commande_existe($_SESSION['id_user'])))
    {
        //echo "boucle commande existe ", commande_nb($_SESSION['id_user']);
        ajout_ligne_com($_GET['id'],commande_nb($_SESSION['id_user']));
    }
    //si une commande n'existe pas encore 
    else 
    {
        commande_create($_SESSION['id_user']);
        //echo "boucle commande existe pas ", commande_nb($_SESSION['id_user']);
        ajout_ligne_com($_GET['id'],commande_nb($_SESSION['id_user']));
    }
}


$stock = bdd('SELECT * FROM `stock`');

ob_start();

foreach ($stock as $track){
    echo affichage_item($track['id_musique'], $track['titre'], $track['prix'], $track['description']);
}

$content = ob_get_clean();
require('.\view\shop.php');

?>