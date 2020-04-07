<?php

$title = 'Ajouter Film';
$ombdKey = 'a76f9717';
$movieTitle = 'GhostBusters';

// Appel de l'api
$resultJson = file_get_contents("http://www.omdbapi.com/?apikey=$ombdKey&t=$movieTitle");
// transforme une chaîne content du JSON en tableau (le true en deuxième paramètre indique qu'on veut un tableau PHP)
$result = json_decode($resultJson, true);
ob_start();
?>
<form>
<div class="form-group">
    <label for="title">mov_title</label>
    <input type="text" class="form-control" id="title" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="poster">poster</label>
    <input type="text" class="form-control" id="poster" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="actors">actors</label>
    <input type="text" class="form-control" id="actors" placeholder="actors">
  </div>
  <div class="form-group">
    <label for="plot">plot</label>
    <input type="text" class="form-control" id="plot" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="file">file</label>
    <input type="text" class="form-control" id="file" placeholder="file">
  </div>
  <div class="form-group">
    <label for="device">device</label>
    <input type="text" class="form-control" id="device" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="Category">Selectionne Category</label>
    <select multiple class="form-control" id="Category">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
</form>


<?php
 var_dump($result);
$content = ob_get_clean();
require_once '../template.php';