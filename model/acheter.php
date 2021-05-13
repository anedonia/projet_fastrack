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
    function formulation_cart($user_id)
    {
        $bdd = db_connect();

        $sql = 'SELECT id_musique as target,(
            SELECT titre from stock where id_musique = target) as titre 
            ,quantite,prix 
            from ligne_commande 
            where etat = "wait" and id_commande =( 
            SELECT id_commande 
            from commande 
            where id_user= ? 
            and total is null)';     //le total n'est set que quand on passe la commande (filtrage)

        $req = $bdd -> prepare ($sql) ;
        $req->execute([$user_id]);

        $data = $req->fetchAll();
        
        return $data;        
        
        
    }


    function titre_musique($id_musique)
    {
        $bdd = db_connect();

        $sql = 'SELECT titre FROM stock where id_musique = ?';     //le total n'est set que quand on passe la commande (filtrage)

        $req = $bdd -> prepare ($sql) ;
        $req->execute([$id_musique]);

        $data = $req->fetch();
        return $data;        
    }