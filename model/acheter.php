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