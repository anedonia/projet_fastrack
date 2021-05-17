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

    //fonction qui return le titre / quantité / le prix de chauqe ligne commande sous forme de tab assoc
    function formulation_vente($user_id)
    {
        $bdd = db_connect();

        $sql = 'SELECT id_musique as target,(
            SELECT titre from stock where id_musique = target) as titre ,
            SUM(quantite) as quantite, 
            (SUM(quantite)*prix) as gain 
            from ligne_commande 
            where id_musique IN (
                SELECT id_musique 
                FROM stock 
                where id_user1 = ? ) 
            GROUP BY id_musique';     //le total n'est set que quand on passe la commande (filtrage)

        $req = $bdd -> prepare ($sql) ;
        $req->execute([$user_id]);

        $data = $req->fetchAll();
        
        return $data;        
        
        
    }


    