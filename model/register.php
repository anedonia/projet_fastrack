<?php

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

function id_unique($id)
{
    $bdd = db_connect();
    
    $sql = 'SELECT COUNT(identifiant) AS id FROM user where identifiant = ? ';     //le total n'est set que quand on passe la commande (filtrage)

    $req = $bdd -> prepare ($sql);
    $req->execute([$id]);

    $data = $req->fetch();

    if (intval($data["id"]) == 0)
    {
       return 0; 
    }
    else 
    {
        array_push($_GET['err'], 'Le nom d\'utilisation doit etre unique');
    }
}
