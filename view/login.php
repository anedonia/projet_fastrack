  
<?php require 'header.php'?>
<div id="all">
    <div id="container">
        <!-- zone de connexion -->
        
        <form action="./index.php" method="GET">
            <h1>Connexion</h1>
            
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' name='action' value='LOGIN' >
            
            <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                
            }
            ?>
        </form>

        <form action="./index.php" method="GET">
				<input id='submit' type="submit" value="sign_out" name="action">
		</form>

        <form action="./index.php" method="GET">
            <input type="submit" id='submit' value='INSCRIPTION' name='action' >
        </form>
    </div>
</div>

<?php require 'footer.php'?> 