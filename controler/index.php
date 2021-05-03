<?php 

    	
    if (!isset($_POST["action"]))
	{
		include("../view/login.php");
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