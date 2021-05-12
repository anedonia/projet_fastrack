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

//  attention ce qui va suivre est illegal, à ne surtout pas reproduire a la maison
function affichage_item($id_image, $titre, $prix, $description){
    $onclick = 'document.getElementById('.$id_image.').submit()';
    $affichage = '
    <div class="grid__item">
        <div class="card"><img class="card__img" <img src="data:image/jpeg;base64,'.base64_encode(encoded_image($id_image)).'"/>
            <div class="card__content">
                <h1 class="card__header">'.$titre.'</h1>
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

?>