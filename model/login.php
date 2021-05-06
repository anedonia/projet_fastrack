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
    function user_check($mdp, $identifiant)
    {
        $bdd = db_connect();

        $sql = 'SELECT id_user FROM user WHERE identifiant = ? and mdp = SHA1(?) ';
        $req = $bdd -> prepare ($sql) ;
        $req->execute([$identifiant, $mdp]);

        $data = $req->fetch();
        $row = $req->rowCount();        

        // si le row est égal à 1 alors un utilisateur ac le combo mdp/identifiant existe
        if ($row == 1 )
        {
            return true;
        }
    }

    //fonction qui récupère les infos du client (sauf le hash du mdp)
    function user_info($identifiant)
    {
        $bdd = db_connect();

        $sql = 'SELECT id_user,prenom,nom,identifiant,mail,role  FROM user WHERE identifiant = ?';
        $req = $bdd -> prepare ($sql);
        $req->execute([$identifiant]);

        $data = $req->fetch();
              
        return $data;
    }
