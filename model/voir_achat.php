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

    //fonction qui return le id_commande / paiment / total de toutes les commandes d'un user sous forme de tab assoc
    function commande($user_id)
    {
        $bdd = db_connect();

        $sql = 'SELECT id_commande,total FROM `commande` where id_user = ? and total is not null';     //le total n'est set que quand on passe la commande (filtrage)

        $req = $bdd -> prepare ($sql) ;
        $req->execute([$user_id]);

        $data = $req->fetchAll();
        return $data;        
    }

    //fonction qui return le titre / quantité / le prix des lignes com pour une commande donnée(sous forme de tab assoc)
    function contenu_commande($id_commande)
    {
        $bdd = db_connect();

        $sql = 'SELECT id_musique as target,(
            SELECT titre 
            from stock 
            where id_musique = target) as titre,
            quantite ,prix 

            from ligne_commande 
            where id_commande = ?';

        $req = $bdd -> prepare ($sql) ;
        $req->execute([$id_commande]);

        $data = $req->fetchAll();
        return $data;        
    }