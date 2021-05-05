<?php
require('view\header.php');
?>

<div id="container">
            <!-- zone de d'enregistrement -->
            
            <form action="./index.php" method="POST">
                <h1>Register</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <input type="submit" id='submit' value='inscription.php' name ='action'>
            </form>
        </div>

<?php
require('view\footer.php');
?>