<?php







    $page_css = "\"./public/style_login.css\"";
    $title = "login";

    ob_start();
   
    $content = ob_get_clean();

    $content = "bite";
    require('view/login.php');
?>    
    