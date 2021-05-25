<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}
require('.\model\upload.php');
$title = "account";
$jour_mois = date("m.d.y");

$heure = date("H:i");

if (!empty($_POST['valider'])){
    if(!empty($_POST['nom']) && !empty($_POST['auteur']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty(file_get_contents($_FILES['image']['tmp_name'])) && !empty(file_get_contents($_FILES['son']['tmp_name']))){
        
        ajout_musique(file_get_contents($_FILES['image']['tmp_name']), file_get_contents($_FILES['son']['tmp_name']), $_POST['nom'], $_POST['auteur'], $_POST['description'], $_POST['prix']);
        ajout_auteur($_POST['auteur']);
        ajout_fait_par($_POST['nom'], $_POST['auteur']);
        header('Location: index.php?action=account');
        exit();
    }
    else{
        ob_start();
        echo'veuillez remplir tous les champs svp';
        $content = ob_get_clean();
        require('.\view\upload.php');
    }
}
else{
    ob_start();
    $content = ob_get_clean();
    require('.\view\upload.php');
}

//limitation des options en fonction des roles

?>