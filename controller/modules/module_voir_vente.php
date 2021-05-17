<?php 
function show_vente($cart)
{
    $tab_html = [];

    array_push($tab_html,
    "<div class=\"center_container\">
        <p>Nous sommes le ".date("m.d.y")." il est ".date("H:i")."</p>  

        <table class=\"user_info\">
        <tr>
                <td> Titre </td>
                <td> Quantite </td> 
                <td> Gain </td> 
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
                <td>".$cart[$i]['gain']." € </td> 
            </tr>");

            $total += $cart[$i]['gain'];
           }
           else 
           {
            array_push($tab_html,
            "<tr>
                <td>Total</td>
                <td>: </td> 
                <td>".$total." € </td> 
            </tr>");
           }
	   }
    array_push($tab_html,
        "</table>
    </div>");

    
    return implode($tab_html);
}
