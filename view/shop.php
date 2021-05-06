
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=<?= $page_css ?> rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body>
<table>
    <tr>
        <form action="./index.php" method="POST">
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
        </form>
    </tr>
    <tr>
    <?= $content ?>
    </tr>
</table>
</body>
</html>