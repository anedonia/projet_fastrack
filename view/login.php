<?php require 'header.php'?>

<div id="container">
            <!-- zone de connexion -->
            
            <form action="./index.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="identifiant" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php

                

                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    
                }
                ?>
            </form>
            <form action="./index.php" method="POST">
                <input type="submit" id='submit' value='inscription.php' name='action' >
            </form>
        </div>

<?php require 'footer.php'?> 