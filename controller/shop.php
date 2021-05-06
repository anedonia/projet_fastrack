<?php
$page_css = "\"../public/style_shop.css\"";
$title = "shop";


print_r($_POST);
ob_start();
//ici
$content = ob_get_clean();
require('.\view\shop.php');

?>