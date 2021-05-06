

<?php
session_start();
	try 
	{
			if (!isset($_POST["action"]))
		{
			include("./controller/login.php");
			//ici login du controler le ../view/login est temporaire
		}
		else 
		{    
			switch ($_POST["action"]) {
				case  'INSCRIPTION':
					include("./controller/register.php");
					break;
				case 'sign_out':
					include("./controller/sign_out.php");
					break;
				case  'questions.php':
					include("../view/inscription.php");
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