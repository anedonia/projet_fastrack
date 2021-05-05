<?php


function bite()
{
    for ($i=0; $i<10; $i++)
    {
        echo "giga chibre";
    }
}
    bite();

    function db_connect()
    {
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=lib_4','root','');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

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

        $req = $bdd->query('SELECT id FROM user WHERE mdp = SHA1(:mdp) AND identifiant :identifiant');
        $req = $bdd->prepare($sql);
        $req->execute(['mdp' => $mdp ,'identifiant' => $identifiant]);

        var_dump($req);
    }



