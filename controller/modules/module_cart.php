<?php

/*funtion qui prend en argument un tableau assoc et crée une string
qui contient le code html de la table contenant tous les différents 
éléments du cart. 
*/ 

function show_cart($cart)
{
    $tab_html = [];

    array_push($tab_html,
    "<div class=\"center_container\">
        <p>Nous sommes le ".date("m.d.y")." il est ".date("H:i")."</p>  

        <table class=\"user_info\">");

	for ($i=0;$i < count($cart); $i++) 
	   {
	    	array_push($tab_html,
            "<tr>
                <td>".$cart[$i]['titre']."</td>
                <td>".$cart[$i]['quantite']."</td> 
                <td>".$cart[$i]['prix']."</td> 
            </tr>");
	   }
    array_push($tab_html,
        "</table>
    </div>");

    
    return implode($tab_html);
}


?>