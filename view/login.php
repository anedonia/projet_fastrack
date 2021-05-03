<!DOCTYPE html>
<html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="./style.css">
            <title>FASTRACK LOGIN</title>
        </head>


    <?php 
    if(isset($_GET['login_err']))
    {
        $err = htmlspecialchars($_GET['login_err']);

        switch($err)
        {
            case 'password':
            ?>
                <div class="erreur">
                    <strong>Erreur</strong> Mot de passe incorrect
                </div>
            <?php
            break;

            case 'user':
            ?>
                <div class="erreur">
                    <strong>Erreur</strong> Username incorrect
                </div>
            <?php
            break;

            case 'already':
            ?>
                <div class="erreur">
                    <strong>Erreur</strong> Compte non existant
                </div>
            <?php
            break;
        }
    }
    ?>

        <body>
        <form action="../controler/login.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="user" name="user" class="form-control" placeholder="Username" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn_login">Connexion</button>
                </div>   
            </form>
            <p class="btn_register"><a href="../view/register.php">Inscription</a></p>
        </body>
</html>