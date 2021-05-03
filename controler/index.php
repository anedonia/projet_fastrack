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
    include('../view/login.php');
?> 