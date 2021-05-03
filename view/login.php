<!DOCTYPE html>
<html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="./style.css">
            <title>FASTRACK LOGIN</title>
        </head>

        <body>
        <form action="login.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="user" name="user" class="form-control" placeholder="Username" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="button_login">Connexion</button>
                </div>   
            </form>
            <p class="button_register"><a href="inscription.php">Inscription</a></p>
        </body>
</html>