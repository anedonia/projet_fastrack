

<?php
session_start();

print_r($_POST);
print_r($_SESSION);
	try 
	{
		if (!isset($_POST["action"]))
		{
			include("./controller/login.php");
		}
		else 
		{    
			switch ($_POST["action"]) {

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
				case  'news.php':
					include("../view/inscription.php");
					break;
				case  'cd.php':
					include("../view/inscription.php");
					break;
				case  'about.php':
					include("../view/inscription.php");
					break;
			}
		}
	}
	catch(Exeception $e)
	{
		echo 'Erreur : '. $e->getMessage();
	}
?>