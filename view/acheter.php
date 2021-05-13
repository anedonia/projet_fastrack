
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./public/style_profil.css" rel="stylesheet">
    <link href="./public/acheter.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <title>acheter</title>
</head>
<body>
<table class="tab2"id='header' >
    <tr>
        
            <div class="topnav" id='header'>


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
</table> 
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

                <form id="supprimer_compte" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="supprimer_compte"/>
                </form>
                <a href='#' onclick='document.getElementById("supprimer_compte").submit()'>Supprimer compte</a>
                
            </div>
        
    </div>

       
    <?= $html_cart ?>

    <div class="center_container">
    <div class="col-75">
        <div class="container">
        <form action="./index.php" method="GET">
        
            <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
                <div class="row">
                <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
                </div>
            </div>
            
            </div>
            <input class="btn" type="submit" value="acheter" name="action" class="btn">
            <input type="hidden" name="confirmation" value="yes"/>
        </form>
        </div>
    </div>

<script>



</script>
</body>
</html>