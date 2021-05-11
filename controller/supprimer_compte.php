<?php
require('.\model\supprimer_compte.php');
$page_css = "";
$title = "supprimer_compte";
ob_start();
//ici
$content = ob_get_clean();
$identifi = $_SESSION["id_user"];
bdd('DELETE FROM `user` WHERE `user`.`id_user` = "'.$identifi.'";');
setcookie('account_deleted', True, time()+20);
session_destroy();
header('Location: index.php');
exit();
?>