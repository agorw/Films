<?php
require_once './../src/common.php';

$page = $_GET['p'] ?? 'accueil';

if (!preg_match('/^[a-zA-Z_]*$/', $page)) {
    $page = 'accueil';
}
require_once "./../src/page/$page.php";
