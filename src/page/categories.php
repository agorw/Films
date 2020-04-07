<?php

$title = 'Categories';
ob_start();
?>
ton code ici
<?php
$content= ob_get_clean();
require_once '../template.php';