<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}


?>