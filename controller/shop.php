<?php
$page_css = "\"../public/style_shop.css\"";
$title = "shop";
ob_start();
//ici
$content = ob_get_clean();
require('..\view\shop.php');

?>