<?php




    function db_connect()
    {
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=fastrack','root','');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            echo 'connextion réussie';
            return $pdo;
        }
        catch (PDOException $e)
        {
            echo "bug lors de la co ac la bdd";
        }
    }

    function user_check($mdp, $identifiant)
    {
        $bdd = db_connect();

        $sql = $bdd->query('SELECT id_user FROM user WHERE identifiant = :identifiant)');
        $req = $bdd -> prepare ($sql) ;
        $req->execute(['identifiant' => $identifiant]);


        print_r($row);
    }



/*
    {
        $bdd = db_connect();

        $sql = $bdd->query('SELECT id_user FROM user WHERE (mdp = SHA1(:mdp) AND identifiant = :identifiant)');
        $req = $bdd->prepare($sql);
        $req->execute(['mdp' => $mdp ,'identifiant' => $identifiant]);

        var_dump($req);
    }

*/

