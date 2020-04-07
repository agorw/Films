<?php

$title = 'Recherche';
ob_start();
?>

<form action="?p=recherche" method="POST" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Recherche">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ok</button>
</form>
<?php
$content= ob_get_clean();

require_once '../template.php';