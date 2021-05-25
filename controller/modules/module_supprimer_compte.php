<?php

function affichage_connexion(){
    echo'<form action="" method="POST">
    <label><b>Identifiant : </b></label><br>
    <input type="text" name="pseudo"><br><br>
    <label><b>Mot de passe : </b></label><br>
    <input type="text" name="mdp"><br><br>
    <input type="submit" value="verifier">
</form>';
}
function affichage_fin(){
    echo'<div><b>Êtes vous vraiment sûr de vouloir supprimer votre compte FASTRACK ?</b></div><br><br>
    <form action="" method="POST">
        <input type="submit" name="supprimer" value="supprimer le compte">
    </form>';
}
?>