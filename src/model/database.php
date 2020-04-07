<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=manage_movies', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    $pdo->exec('SET CHARACTER SET utf8'); 
} catch (\Throwable $th) {
    echo 'Erreur de connexion a la base de donnees';
}
