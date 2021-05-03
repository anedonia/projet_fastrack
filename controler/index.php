<!--
Author: Hello (World)
index.php (c) 2021
Desc: description
Created:  2021-05-03T09:57:37.637Z
Modified: !date!
-->



<?php

	if (!isset($_GET["action"]))
	{
		include("projet_fastrack\\view\\accueil");
	}

	switch ($_GET["action"]) {
		case  'questions.php':
			include("questions.php");
			break;
		case  'news.php':
			include("news.php");
			break;
		case  'cd.php':
			include("cd.php");
			break;
		case  'about.php':
			include("about.php");
			break;
		case 'index.php':
			include("mainlayout.php");
			break;
		case 'showcart.php':
			include("showcart.php");
			break;
		case 'checkout.php':
			include("checkout.php");
			break;		
	}
	