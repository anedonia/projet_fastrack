<?php

function db_connect(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=fastrack','root','');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        //echo 'connextion réussie';
        return $pdo;
    }
    catch (PDOException $e){
        echo "bug lors de la co ac la bdd";
    }
}

function select_user($structure){
    $bddUser = 'root';
    $bddMdp = '';
    try {
        $db = new PDO ('mysql:host=localhost;dbname=fastrack', $bddUser, $bddMdp);
        $requete_array = [];
        foreach($db->query('SELECT `'.$structure.'` from `user` WHERE `id_user` = '.$_SESSION['id_user'].';') as $row){
            array_push($requete_array, $row);
    }
    return $requete_array;
    }catch(PDOException $e){
        echo 'erreur : '. $e->getMessage()."<br/>";
        die;
    }
}

//  update(structure, id_user, nouvelle value)
function update_user($structure, $new_prenom){
    $pdo = db_connect();
    $req = $pdo->prepare('UPDATE `user` SET `'.$structure.'` = "'.$new_prenom.'" WHERE `user`.`id_user` = "'.$_SESSION['id_user'].'";');
    $req->execute();
    //echo'updated';
}


?>