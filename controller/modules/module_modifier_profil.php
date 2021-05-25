<?php
//https://youtu.be/inPc5ivJ9VU
function affichage_modif($prenom, $nom, $identifiant, $mail){
    echo'<form action="" method="post">
    <label><b>Prénom : <b/></label><br>
    <input type="text" name="prenom" placeholder="'.$prenom.'"><br><br>



    <label ><b>Nom : <b/></label><br>
    <input type="text" name="nom" placeholder="'.$nom.'"><br><br>


    <label ><b>Identifiant : <b/></label><br>
    <input type="text" name="identifiant" placeholder="'.$identifiant.'"><br><br>



    <label ><b>Mot de passe : <b/></label><br>
    <input type="text" name="mdp" placeholder="******"><br><br>



    <label ><b>Mail : <b/></label><br>
    <input type="text" name="mail" placeholder="'.$mail.'"><br><br>
    <input type="submit" value="changer">
</form>';
}

function affichage_connexion(){
    echo'<form action="" method="POST">

    <label><b>Identifiant : <b/></label><br>
    <input type="text" name="pseudo"><br><br>

    <label><b>Mot de passe : <b/></label><br>
    <input type="text" name="mdp"><br><br>
    
    <input type="submit" value="verifier">
</form>';
}

?>