

<?php
    //include('../view/login.php');

    	if (!isset($_POST["action"]))

	{
		include("../view/login.php");
        //ici login du controler le ../view/login est temporaire
	}
    else 
    {    
        switch ($_POST["action"]) {
            case  'inscription.php':
                include("../view/inscription.php");
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
?> 