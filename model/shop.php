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

function encoded_image($id_image){
    $pdo = db_connect();
    $req = $pdo->prepare('select `image` from `stock` where id_musique=?');
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id_image));
    $tab=$req->fetchAll();
    //echo $tab[0]["bin"];
    return $tab[0]["image"];
}

function encoded_son($id_image){
    $pdo = db_connect();
    $req = $pdo->prepare('select `son` from `stock` where id_musique=?');
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($id_image));
    $tab=$req->fetchAll();
    //echo $tab[0]["bin"];
    //var_dump($tab);
    return $tab[0]["son"];
}

function son_preview($id_son){
    $array = base64_encode(encoded_son($id_son));
    $len = strlen($array);
    $lenf = $len/20;
    //echo intval($lenf).'<br>';
    $listef = [];
    for($i=0;$i<750000;$i++){
        array_push($listef, $array[$i]);
    }
    $listeff = implode("", $listef);
    //var_dump($listeff);
    return $listeff;
}


//  attention ce qui va suivre est illegal, à ne surtout pas reproduire a la maison
//https://youtu.be/5KmMMeDakTA
function affichage_item($id_image, $titre, $prix, $description, $preview_son){
    $onclick = 'document.getElementById('.$id_image.').submit()';
    $affichage = '
    <div class="grid__item">
        <div class="card"><img class="card__img" <img src="data:image/jpeg;base64,'.base64_encode(encoded_image($id_image)).'"/>
            <div class="card__content">
                <h1 class="card__header">'.$titre.'</h1>
                <audio controls><source src="data:audio/mpeg;base64,'.$preview_son.'"></audio>
                <p class="card__text"><strong>'.$prix.'€</strong><br>'.$description.'</p>

                <form id="'.$id_image.'" action="./index.php" method="GET">
                    <input type="hidden" name="action" value="shop"/>
                    <input type="hidden" name="id" value="'.$id_image.'"/>
                    <input type="hidden" name="ajout" value="yes"/>
                </form>
                <a href="#" class="card__btn" onclick='.$onclick.'>ajouter au panier<span>&rarr;</span></a>
            </div>
        </div>
    </div>';
    return $affichage;
}

//je me désolidarise du code au-dessus

//à commenter
function commande_existe($id_user)
{
    $bdd = db_connect();

    $sql = 'SELECT id_commande FROM commande where id_user = ? and total is null';     //le total n'est set que quand on passe la commande (filtrage)

    $req = $bdd -> prepare ($sql);
    $req->execute([$id_user]);

    $data = $req->fetch();

    if (isset ($data["id_commande"]))
    {
       return intval($data["id_commande"]); 
    }
    else 
    {
        return null;
    }
}

function commande_nb($id_user)
{
    $bdd = db_connect();

    $sql = 'SELECT id_commande FROM commande where id_user = ? and total is null';     //le total n'est set que quand on passe la commande (filtrage)

    $req = $bdd -> prepare ($sql);
    $req->execute([$id_user]);

    $data = $req->fetch();

    return intval($data["id_commande"]); 
}

//à commenter
function ajout_ligne_com($id_musique, $id_commande)
{
    $bdd = db_connect();

    $data = [
        'idmusique' => $id_musique,
        'idcommande' => $id_commande
    ];

    $sql = 'INSERT INTO ligne_commande (id_musique,id_commande,quantite,prix,etat) 
    VALUES (:idmusique,:idcommande,1,
    (SELECT prix FROM stock where id_musique = :idmusique),
    "wait")';     

    $req = $bdd -> prepare ($sql) ;
    $req->execute($data);
}

function commande_create($id_user)
{
    $bdd = db_connect();

    $sql = 'INSERT INTO commande (id_user) VALUES (?);';     

    $req = $bdd -> prepare ($sql);
    $req->execute([$id_user]);

}

function test_doublon($id_commande,$id_musique)
{
    $bdd = db_connect();

    $sql = 'SELECT id_ligne_commande from ligne_commande where id_commande = ? and id_musique = ?';     

    $req = $bdd -> prepare ($sql);
    $req->execute([$id_commande,$id_musique]);

    $data = $req->fetch();

    if (isset ($data["id_ligne_commande"]))
    {
       return true; 
    }
    else 
    {
        return false;
    }
}

function update_ligne($id_commande,$id_musique)
{
    $bdd = db_connect();

    $sql = 'UPDATE ligne_commande set quantite = quantite+1  where id_commande = ? and id_musique = ?';     

    $req = $bdd -> prepare ($sql);
    $req->execute([$id_commande,$id_musique]);
}

function search_result($mot)
{
    
    $bdd = db_connect();

    $sql = 'SELECT id_musique, titre,prix,description
    from stock 
    LEFT join fait_par on stock.id_musique = fait_par.id_musique_2 
    left JOIN auteur on fait_par.id_auteur = auteur.id_auteur 
    where titre like CONCAT("%", ? , "%")
    OR nom like CONCAT("%", ? , "%") ';     

    $req = $bdd -> prepare ($sql);
    $req->execute([$mot,$mot]);

    $data = $req->fetchAll();

    return $data;
}
//['mot' => '"%'.$mot.'%"']
?>