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

    //fonction qui renvoie true si le combo mdp / username existe dans la db
    function formulation_cart($user_id)
    {
        $bdd = db_connect();

        $sql = 'SELECT (select titre from stock where id_musique = id_musique) as titre, quantite, prix  from ligne_commande where etat = "wait" and 
        id_commande = ( SELECT id_commande from commande where id_user = ?)';
        $req = $bdd -> prepare ($sql) ;
        $req->execute([$user_id]);

        $data = $req->fetchAll();
        return $data;        
    }
