<?php
session_start();
session_destroy();

$_POST["action"] = "";
setcookie("sign_out", True, time()+20);
header('Location: index.php');
exit();
?>