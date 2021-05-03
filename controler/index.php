<?php
    //include('../view/login.php');

    	if (!isset($_POST["action"]))
	{
		include("../view/login.php");
        //ici login du controler le ../view/login est temporaire
	}

	switch ($_POST["action"]) {
		case  'questions.php':
			include("questions.php");
			break;
				
	}

?> 