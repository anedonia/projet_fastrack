<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require_once('./model/voir_cart.php');

$cart = formulation_cart($_SESSION['id_user']);

//c'est ultra buggé ne pas toucher 
function show_cart($cart)
{
    $tab_html = [];
    array_push($tab_html,
    "<div class=\"center_container\">
        <p>Nous sommes le ",$jour_mois,"il est ",$heure,"</p>  

        <table class=\"user_info\">");

	for ($i=0;$i < count($cart); $i++) 
	   {
	    	array_push($tab_html,
            "<tr>
                <td>",$cart[$i]['titre'],"</td>
                <td>",$cart[$i]['quantite'],"</td> 
                <td>",$cart[$i]['prix'],"</td> 
            </tr>");
	   }
    array_push($tab_html,
        "</table>
    </div>");
		
    return serialize($tab_html);
}


$jour_mois = date("m.d.y");
$heure = date("H:i");

$page_css = "\"./public/style_profil.css\"";
$title = "Cart";


$content = show_cart($cart);

require('.\view\voir_cart.php');

