<?php
require('view\header.php');
?>
<div id="all">
    <div id="container">
            <!-- zone de d'enregistrement -->
            
        <form action="./index.php" method="GET">
            <h1>Register</h1>
            
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <label><b>Prénom</b></label>
            <input type="text" placeholder="Entrer votre prénom" name="first_name" required>
            <label><b>Nom</b></label>
            <input type="text" placeholder="Entrer le mot de passe" name="full_name" required>
            <label><b>Mail</b></label>
            <input type="text" placeholder="Entrer votre email" name="email" required>
            <input type="radio" id="acheteur" name="type_client" value="client" checked>
            <label for="Acheteur"><b>Acheteur</b></label><br>
            <input type="radio" id="vendeur" name="type_client" value="vendeur">
            <label for="vendeur"><b>Vendeur</b></label>
            <input type="submit" id='submit' value='INSCRIPTION' name ='action'>
        </form>
    </div>
    <?php echo $err; ?>
</div>
<?php
require('view\footer.php');
?>