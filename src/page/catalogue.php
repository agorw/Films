<?php



// $films =  getCatalogueElements() ;


// Le numéro de la page est envoyé par une GET
$page = $_GET['page'] ?? 1; // Par défaut c'est la première page
// Calcul de l'offset
$offset = ($page - 1) * 3; // Page - 1 car on veut l'offset à 0 pour la page 1
$movieCount = getMovieCount();
$movies = getMovieOffset($page);


// Calcul s'il y a une page precédente (donc $page > 1)
$hasPrevPage = ($page >= 1);

// Calcul s'il y a une page suivante (donc $page*10 < nombre total de film)
$hasNextPage = ($page <= ceil($movieCount/3));

ob_start();
?>
<div class="dropdown mb-1">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Trier par
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Date d'ajout</a>
    <a class="dropdown-item" href="#">Ordre Croissant</a>
    <a class="dropdown-item" href="#">Ordre décroissant</a>
  </div>
</div>

<div>
<?php foreach ($movies as $movie): ?>
  <div class="card mb-1" style="max-width: 1000px;">
  
    <div class="row no-gutters">
      <div class="col-md-2">
        <img src="<?= $movie['mov_poster'] ; ?>" width="120px" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $movie['mov_title'] ; ?></h5>
          <p class="card-text">
            <?= $movie['mov_plot'] ; ?>
            </p>        
        </div>
      </div>
      <div class="col-md-2">
      <p><a href="?p=detail&idfilm=<?= $movie['mov_id'] ; ?>"><button type="button" class="btn btn-primary btn-lg ml-3 ">Details</button></a> </p>
      <p><a href="?p=ajouterfilms&idfilm=<?= $movie['mov_id'] ; ?>"><button type="button" class="btn btn-primary btn-lg ml-3 ">Modifier</button></a> </p>
      </div>
    </div>
  </div>

  
  <?php endforeach ; ?>

  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li>
    <?php if ($hasPrevPage): ?>
      <a class="page-link" href="?p=catalogue&page=<?=($page - 1); ?>">Previous</a>
      <?php endif; ?> 
    </li>
    <li>
    <?php if ($hasNextPage): ?>
      <a class="page-link" href="?p=catalogue&page=<?=($page + 1); ?>">Next</a>
      <?php endif; ?>
    </li>
  </ul>
</nav>
</div>






<?php



$content = ob_get_clean();
