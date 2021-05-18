<?php
//https://youtu.be/inPc5ivJ9VU
function affichage_modif($prenom, $nom, $identifiant, $mdp, $mail){
    echo'<form action="" method="post">
    <label >prénom : </label>
    <input type="text" name="prenom"> ('.$prenom.')<br><br>



    <label >nom : </label>
    <input type="text" name="nom"> ('.$nom.')<br><br>


    <label >identifiant : </label>
    <input type="text" name="identifiant"> ('.$identifiant.')<br><br>



    <label >mot de passe : </label>
    <input type="text" name="mdp"> ('.$mdp.')<br><br>



    <label >mail : </label>
    <input type="text" name="mail"> ('.$mail.')<br><br>
    <input type="submit" value="changer">
</form>';
}

function affichage_connexion(){
    echo'<form action="" method="POST">
    <label>pseudo : </label>
    <input type="text" name="pseudo"><br><br>
    <label>mot de passe : </label>
    <input type="text" name="mdp"><br><br>
    <input type="submit" value="verifier">
</form>';
}

?>