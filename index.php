

<?php
session_start();

	try 
	{
		if (!isset($_GET['action']))
		{
			include('./controller/login.php');
		}
		else 
		{
			switch ($_GET["action"]) {

				case  'LOGIN':
					include("./controller/login.php");
					break;
				case  'INSCRIPTION':
					include("./controller/register.php");
					break;
				case 'sign_out':
					include("./controller/sign_out.php");
					break;
				case  'shop':
					include("./controller/shop.php");
					break;
				case  'accueil':
					include("./controller/accueil.php");
					break;
				case  'account':
					include("./controller/voir_profil.php");
					break;
				case  'cart':
					include("./controller/voir_cart.php");
					break;
				case  'voir_achat':
					include("./controller/voir_achat.php");
					break;
				case  'modifier_profil':
					include("./controller/modifier_profil.php");
					break;
				case  'supprimer_compte':
					include("./controller/supprimer_compte.php");
					break;
				case  'voir_vente':
					include("./controller/voir_vente.php");
					break;
				case  'mettre_en_vente':
					include("./controller/mettre_en_vente.php");
					break;
				case  'about.php':
					include("./view/inscription.php");
					break;
				default :
					include("./controller/login.php");
			}
		}
	}
	catch(Exeception $e)
	{
		echo 'Erreur : '. $e->getMessage();
	}
?>