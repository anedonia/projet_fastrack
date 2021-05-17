<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./public/style_profil.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
    <table class="tab2">
        <tr>
            
                <div class="topnav">
                    <!-- j'ai trouvé cette strat sur un forum c'est vraiment trop bien, en gros c'est le bouton
                    c'est un href qui appelle un input invisible donc comme un input submit-->
                    <form id="shop" action="./index.php" method='GET'>
                        <input type="hidden" name="action" value="shop"/>
                    </form>
                    <a href='#' class = "active" onclick='document.getElementById("shop").submit()'>Fastrack</a>
                    
                    <form id="shop" action="./index.php" method='GET'>
                        <input type="hidden" name="action" value="shop"/>
                    </form>
                    <a href='#' onclick='document.getElementById("shop").submit()'>Shop</a>

                    <form id="game" action="./index.php" method='GET'>
                        <input type="hidden" name="action" value="accueil"/>
                    </form>
                    <a href='#' onclick='document.getElementById("game").submit()'>Accueil</a>

                    <form id="account" action="./index.php" method='GET'>
                        <input type="hidden" name="action" value="account"/>
                    </form>
                    <a href='#' onclick='document.getElementById("account").submit()'>Account</a>

                    <form id="sign_out" action="./index.php" method='GET'>
                        <input type="hidden" name="action" value="sign_out"/>
                    </form>
                    <a href='#' onclick='document.getElementById("sign_out").submit()'>Sign Out</a>
                    
                </div>
        </tr>
    </table >
    <div class="left_container">
        
            <div class="left_nav">
                <!-- j'ai trouvé cette strat sur un forum c'est vraiment trop bien, en gros c'est le bouton
                c'est un href qui appelle un input invisible donc comme un input submit-->

                <form id="voir_achat" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="voir_achat"/>
                </form>
                <a href='#' onclick='document.getElementById("voir_achat").submit()'>Achats</a>

                <form id="cart" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="cart"/>
                </form>
                <a href='#' onclick='document.getElementById("cart").submit()'>Cart</a>

                <form id="modifier_profil" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="modifier_profil"/>
                </form>
                <a href='#' onclick='document.getElementById("modifier_profil").submit()'>Modifier profil</a>

                <form id="voir_vente" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="voir_vente"/>
                </form>
                <a href='#' onclick='document.getElementById("voir_vente").submit()'>Ventes</a>

                <form id="Upload" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="upload"/>
                </form>
                <a href='#' onclick='document.getElementById("upload").submit()'>Upload</a>

                <form id="supprimer_compte" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="supprimer_compte"/>
                </form>
                <a href='#' onclick='document.getElementById("supprimer_compte").submit()'>Supprimer compte</a>
                
            </div>
        
    </div>

    <div class="center_container">
        <p>Nous sommes le <?= $jour_mois ?> il est <?= $heure ?></p>  
        <form name='fo' action="" method='post' enctype='multipart/form-data'>

            <label>image (300x300px) : </label>
            <input type="file" name='image'><br><br>

            <label>musique : </label>
            <input type="file" name='son'><br><br>

            <label>Titre : </label>
            <input type="text" name='nom'><br><br>

            <label>Auteur : </label>
            <input type="text" name='auteur'><br><br>

            <label>description : </label>
            <input type="text" name='description'><br><br>

            <label>Prix : </label>
            <input type="number" name='prix'><br><br>

            <input type="submit" name='valider' value='charger'>
        </form>
        <?= $content ?>
    </div>
    
</body>
</html>