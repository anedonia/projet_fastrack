<?php

/*funtion qui prend en argument un tableau assoc qui contient les lignes commandes et crée une string
qui contient le code html de la table contenant tous les différents 
éléments des achat puis des lignes commande correspondantes. 
*/

function commande_show($commande)
{
    $tab_html = [];

    array_push($tab_html,
    "<div class=\"center_container\">
        <p>Nous sommes le ".date("m.d.y")." il est ".date("H:i")."</p>  

        <table class=\"user_info\">");

    for ($i=0;$i < count($commande); $i++) 
    {
        array_push($tab_html,
            "<tr>
                <td> commande : ".$commande[$i]['titre']."</td>
                <td> moyen de paiement : ".$commande[$i]['paiement']." </td> 
                <td> Total commande : ".$commande[$i]['total']." € </td> 
            </tr>");
        array_push($tab_html,show_cart(contenu_commande($commande[$i]['id_commande'])));
    }
    array_push($tab_html,
        "</table>
    </div>");

    return implode($tab_html);
}

/*funtion qui prend en argument un tableau assoc et crée une string
qui contient le code html de la table contenant tous les différents 
éléments des achat puis des lignes commande correspondantes. 
*/
function show_cart($cart)
{
    $tab_html = [];

    array_push($tab_html,
            "<tr>
                <td> Titre </td>
                <td> Quantite </td> 
                <td> Prix </td> 
            </tr>");

    $total =0;

	for ($i=0;$i < count($cart)+1; $i++) 
	   {
           if ($i < count($cart))
           {
	    	array_push($tab_html,
            "<tr>
                <td>".$cart[$i]['titre']."</td>
                <td>".$cart[$i]['quantite']."</td> 
                <td>".$cart[$i]['prix']*$cart[$i]['quantite']." € </td> 
            </tr>");

            $total += $cart[$i]['prix']*$cart[$i]['quantite'];
           }
           else 
           {
            array_push($tab_html,
            "<tr>
                <td> : ----------------- : </td>
                <td> : ----------------- : </td> 
                <td> : ----------------- : </td> 
            </tr>");
           }
	   }
    
    return implode($tab_html);
}


