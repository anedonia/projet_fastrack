<?php

function affichage_connexion(){
    echo'<form action="" method="POST">
    <label>pseudo : </label>
    <input type="text" name="pseudo"><br><br>
    <label>mot de passe : </label>
    <input type="text" name="mdp"><br><br>
    <input type="submit" value="verifier">
</form>';
}
function affichage_fin(){
    echo'<div>Êtes vous vraiment sûr de vouloir supprimer votre compte FASTRACK ?</div><br><br>
    <form action="" method="POST">
        <input type="submit" name="supprimer" value="supprimer le compte">
    </form>';
}
?>