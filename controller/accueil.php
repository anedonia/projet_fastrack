<?php

$page_css = "\"./public/style_accueil.css\"";
$title = "shop";
ob_start();
//ici
$content = ob_get_clean();
require('./view/accueil.php');

?>