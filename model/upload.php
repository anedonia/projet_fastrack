<?php

function db_connect()
    {
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=fastrack','root','');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            //echo 'connextion réussie';
            return $pdo;
        }
        catch (PDOException $e)
        {
            echo "bug lors de la co ac la bdd";
        }
    }

function bdd($requete){
    $bddUser = 'root';
    $bddMdp = '';
    try {
        $db = new PDO ('mysql:host=localhost;dbname=fastrack', $bddUser, $bddMdp);
        $requete_array = [];
        foreach($db->query($requete) as $row){
            array_push($requete_array, $row);
    }
    return $requete_array;
    }catch(PDOException $e){
        echo 'erreur : '. $e->getMessage()."<br/>".$requete;
        die;
    }
}

function ajout_musique($image, $son, $nom, $auteur, $descrption, $prix){
    $array = bdd('SELECT `titre` FROM `stock`');
    $search = FALSE;
    foreach($array as $value){
        if ($value['titre'] == $nom){
            $search = TRUE;
        }
    }
    if ($search == FALSE){
        $pdo = db_connect();
        $req = $pdo->prepare('INSERT INTO `stock` (`titre`, `prix`, `description`, `son`, `image`, `quantite`, `id_user1`) VALUES (?, ?, ?, ?, ?, 1, ?);');
        $req->execute(array($nom, $prix, $descrption, $son, $image, $_SESSION['id_user']));
        echo'musique added';
    }
}
//https://www.youtube.com/watch?v=MIZbGSXeWWE
function ajout_auteur($auteur){
    $array = bdd('SELECT * FROM `auteur`');
    $search = FALSE;
    foreach($array as $value){
        if ($value['nom'] == $auteur){
            $search = TRUE;
        }
    }
    if ($search == FALSE){
        $pdo = db_connect();
        $req = $pdo->prepare('INSERT INTO `auteur` (`nom`) VALUES (?);');
        $req->execute(array($auteur));
        echo'auteur added';
    }
}

function ajout_fait_par($titre, $auteur){
    //INSERT INTO `fait_par` (`id_fait_par`, `id_auteur`, `id_musique`) VALUES (NULL, '1', '3');
    $array = bdd('SELECT `id_musique` FROM `stock` WHERE `titre` = "'.$titre.'";');
    $id_musique = $array[0]['id_musique'];
    $array2 = bdd('SELECT `id_auteur` FROM `auteur` WHERE `nom` = "'.$auteur.'";');
    $id_auteur = $array2[0]['id_auteur'];
    $pdo = db_connect();
    $req = $pdo->prepare('INSERT INTO `fait_par` (`id_auteur`, `id_musique_2`) VALUES (?, ?);');
    $req->execute(array($id_auteur, $id_musique));
}
?>