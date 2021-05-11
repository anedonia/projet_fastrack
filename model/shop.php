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
function affichage_items($id_image, $titre, $prix, $description){
    $affichage = '
    <div class="grid__item">
        <div class="card"><img class="card__img" <img src="data:image/jpeg;base64,'.base64_encode(encoded_image($id_image)).'"/>
            <div class="card__content">
                <h1 class="card__header">'.$titre.'</h1>
                <p class="card__text"><strong>'.$prix.'€</strong><br>'.$description.'</p>
                <button class="card__btn">ajouter au panier<span>&rarr;</span></button>
            </div>
        </div>
    </div>';
    return $affichage;
}

?>