<?php
if (empty($_SESSION['id_user'])){
    header('Location: index.php');
    exit();
}

$page_css = "\"./public/style_profil.css\"";
$title = "account";
$jour_mois = date("m.d.y");

$heure = date("H:i");
                       

ob_start();
?>
<form id="voir_vente" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="voir_vente"/>
                </form>
                <a href='#' onclick='document.getElementById("voir_vente").submit()'>Ventes</a>

                <form id="mettre_en_vente" action="./index.php" method='GET'>
                    <input type="hidden" name="action" value="mettre_en_vente"/>
                </form>
                <a href='#' onclick='document.getElementById("Upload").submit()'>Upload</a>
<?php
$content = ob_get_clean();
if ($_SESSION['role'])
require('.\view\voir_profil.php');

?>