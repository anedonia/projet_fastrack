<?php
$page_css = "\"./public/style_shop.css\"";
$title = "Shop";

ob_start();
//ici
$content = ob_get_clean();
require('.\view\shop.php');

?>