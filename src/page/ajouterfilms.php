<?php

$title = 'Ajouter Film';
ob_start();
if(isset($_POST['title'])){
  addFilm($_POST['title'],$_POST['poster'],$_POST['actors'],$_POST['plot'],$_POST['files'],$_POST['device'],$_POST['idCategory']);
}
$cat = category();
?>
<form action="" method="POST">
<div class="form-group">
    <label for="title">mov_title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="poster">poster</label>
    <input type="text" class="form-control" name="poster" id="poster" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="actors">actors</label>
    <input type="text" class="form-control" name="actors" id="actors" placeholder="actors">
  </div>
  <div class="form-group">
    <label for="plot">plot</label>
    <input type="text" class="form-control" name="plot" id="plot" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="file">file</label>
    <input type="text" class="form-control" name="files" id="files" placeholder="file">
  </div>
  <div class="form-group">
    <label for="device">device</label>
    <input type="text" class="form-control" name="device" id="device" placeholder="mov_title">
  </div>
  <div class="form-group">
    <label for="Category">Selectionne Category</label>
    <select class="form-control" name="idCategory" id="Category">
      <?php foreach($cat as $value):?>
      <option value='<?=$value['cat_id'];?>'><?=$value['cat_name'];?></option>
      <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <button class="btn btn-success" type="submit">Enregistre</button>
  </div>
</form>


<?php
$content = ob_get_clean();
require_once '../template.php';