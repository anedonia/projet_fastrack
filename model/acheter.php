<?php

    // fonction qui calcule le total d'une commande
    function total_com($id_commande)
{
    $bdd = db_connect();

    $sql = 'SELECT SUM(quantite*prix) as total from ligne_commande where id_commande = ?';     //le total n'est set que quand on passe la commande (filtrage)

    $req = $bdd -> prepare ($sql);
    $req->execute([$id_commande]);

    $data = $req->fetch();

    return intval($data["total"]); 
}
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





function update_commande($id_commande,$total,$paiement)
{
    $bdd = db_connect();

    //var_dump($paiement);
    
    $data = [
        'idcommande' => $id_commande,
        'cartenum' => $paiement['cardnumber'],
        'total' => $total,
        'expirationmois' => $paiement['expmonth'],
        'expirationanne' => $paiement['expyear'],
        'cvv' => $paiement['cvv'],
        'cartenom' => $paiement['cardname']
    ];

    echo $paiement['cvv'];

    $sql = 'UPDATE commande set 
    total= :total,
    carte_num= :cartenum, 
    expiration_mois= :expirationmois, 
    expiration_annee= :expirationanne, 
    cvv= :cvv, 
    carte_nom= :cartenom

    where id_commande = :idcommande';     //le total n'est set que quand on passe la commande (filtrage)

    $req = $bdd -> prepare ($sql);
    $req->execute($data);
}