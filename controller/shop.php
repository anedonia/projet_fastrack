<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require_once('model\shop.php');
require('modules/module_shop.php');
$page_css = "\"./public/style_shop.css\"";
$title = "Shop";
//echo affichage_items(8, 'lunedefiel', 99.99, "la baise");



//processus d'ajout au panier (loulou)
if(isset($_GET['ajout']))
{
    //si une commande est en cours
    if(null !== (commande_existe($_SESSION['id_user'])))
    {
        if (test_doublon(commande_nb($_SESSION['id_user']),$_GET['id']))
        {
            update_ligne(commande_nb($_SESSION['id_user']),$_GET['id']);
        }
        else 
        {
            //echo "boucle commande existe ", commande_nb($_SESSION['id_user']);
            ajout_ligne_com($_GET['id'],commande_nb($_SESSION['id_user']));
        }
    }

    //si une commande n'existe pas encore 
    else 
    {
        commande_create($_SESSION['id_user']);
        //echo "boucle commande existe pas ", commande_nb($_SESSION['id_user']);
        ajout_ligne_com($_GET['id'],commande_nb($_SESSION['id_user']));
    }
}


//barre de recherche pour un seul mot 
if (isset($_GET['search']) && $_GET['search'] == "")
{
    $stock = bdd('SELECT id_musique, titre,prix,description FROM `stock`');

}
else if (isset($_GET['search']))
{
    //var_dump($_GET['search']);
    $mots = explode(" ",$_GET['search']);

    //on enleve les espaces en trop 
    foreach($mots as $key => $value)
    {
        if ($value == "")
        {
            unset($mots[$key]);
        }
    }

    $stock = [];

    foreach($mots as $key => $value)
    {
        
    $stock = search_result($value);
    }
    //print_r($stock);
}
else
{
    $stock = bdd('SELECT id_musique, titre,prix,description FROM `stock`');
}
//$stock = bdd('SELECT id_musique, titre,prix,description FROM `stock`');



ob_start();

foreach ($stock as $track){
    
    echo affichage_item($track['id_musique'], $track['titre'], $track['prix'], $track['description'], son_preview($track['id_musique']));
}

$content = ob_get_clean();
require('.\view\shop.php');

?>
