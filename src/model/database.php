<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=manage_movies', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    $pdo->exec('SET CHARACTER SET utf8'); 
} catch (Exception $e) {
    echo 'Erreur de connexion a la base de donnees';
}



/**
 * recherche
 */
function search($title){
    global $pdo;
    $request = $pdo->prepare("SELECT * FROM movie WHERE mov_title LIKE :title  ORDER BY `movie`.`mov_id` DESC LIMIT 4");
    $request->execute([':title' => $title.'%']);
    return $request->fetchAll();
}

// return le detail d'un film
function detail($id){
    // SELECT * FROM `movie` WHERE `mov_id`= 1
    global $pdo;
    $request = $pdo->prepare('SELECT * FROM `movie` WHERE `mov_id`= ?');
    $request->execute([$id]);
    return $request->fetch();
    // return un ligne; (fetch()));
}

// ajoute un film a notre base de donnee
function addFilm($title,$poster,$actors,$plot,$files,$device,$idCategory){
    global $pdo;
    $request = $pdo->prepare('INSERT INTO `movie` (`mov_id`, `mov_title`, `mov_poster`, `mov_actors`, `mov_plot`, `mov_file_path`, `mov_device`, `category_cat_id`) 
    VALUES (NULL, :title, :poster, :actors, :plot, :files, :device, :idcategory);');
    $request->execute([
        ':title'=> $title, 
        ':poster'=>$poster, 
        ':actors'=>$actors, 
        ':plot'=>$plot, 
        ':files'=>$files, 
        ':device'=>$device, 
        ':idcategory'=>$idCategory
    ]);
}

// mais a jour un film modifier.
function updateFilm($id,$title,$poster,$actors,$plot,$files,$device,$idCategory){
    global $pdo;
    $request = $pdo->prepare('UPDATE `movie` SET 
    `mov_title` = :title,
    `mov_poster` = :poster,
    `mov_actors`= :actors,
    `mov_plot`=:plot,
    `mov_file_path`=:files,
    `mov_device`=:device,
    `category_cat_id`=:idcategory
    WHERE `movie`.`mov_id` = :id;');
    $request->execute([
        ':title'=> $title, 
        ':poster'=>$poster, 
        ':actors'=>$actors, 
        ':plot'=>$plot, 
        ':files'=>$files, 
        ':device'=>$device, 
        ':idcategory'=>$idCategory,
        ':id'=>$id
    ]);
}
// return la liste des categories et leur id
function category(){
    global $pdo;
    $request = $pdo->query('SELECT * FROM `category`');
    return $request->fetchAll();
}


function getMovieOffset($offset)
{
    global $pdo;
    $request = $pdo->prepare('SELECT * FROM movie LIMIT :offset, 3');
    $request->bindValue(':offset', $offset, PDO::PARAM_INT);
    $request->execute();

    return $request->fetchAll();
}
function getMovieCount()
{
    global $pdo;
    $request = $pdo->query('SELECT COUNT(*) AS nb_movie FROM movie');

    return $request->fetch()['nb_movie']; // Fetch retourne un tableau contenant l'index 'nb_movie';
}