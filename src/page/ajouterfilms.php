<?php

$title = 'Ajouter Film';
ob_start();
if(isset($_POST['title']) && isset($_POST['submit'])){
  addFilm($_POST['title'],$_POST['poster'],$_POST['actors'],$_POST['plot'],$_POST['files'],$_POST['device'],$_POST['idCategory']);
}
if(isset($_POST['title']) && isset($_POST['update']) && isset($_GET['idfilm'])){
  updateFilm($_GET['idfilm'],$_POST['title'],$_POST['poster'],$_POST['actors'],$_POST['plot'],$_POST['files'],$_POST['device'],$_POST['idCategory']);
}
if(isset($_GET['idfilm'])){
  $id = $_GET['idfilm'];
  $film = detail($id);
}
$cat = category();
?>
<form action="" method="POST">
<div class="form-group">
    <label for="title">mov_title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="mov_title" value="<?= $film['mov_title']??'';  ?>">
  </div>
  <div class="form-group">
    <label for="poster">poster</label>
    <input type="text" class="form-control" name="poster" id="poster" placeholder="mov_poster" value="<?= $film['mov_poster']??'';  ?>">
  </div>
  <div class="form-group">
    <label for="actors">actors</label>
    <input type="text" class="form-control" name="actors" id="actors" placeholder="actors" value="<?= $film['mov_actors']??'';  ?>">
  </div>
  <div class="form-group">
    <label for="plot">plot</label>
    <input type="text" class="form-control" name="plot" id="plot" placeholder="mov_plot" value="<?= $film['mov_plot']??'';  ?>">
  </div>
  <div class="form-group">
    <label for="file">file</label>
    <input type="text" class="form-control" name="files" id="files" placeholder="file" value="<?= $film['mov_file_path']??'';  ?>">
  </div>
  <div class="form-group">
    <label for="device">device</label>
    <input type="text" class="form-control" name="device" id="device" placeholder="mov_device" value="<?= $film['mov_device']??'';  ?>">
  </div>
  <div class="form-group">
    <label for="Category">Selectionne Category</label>
    <select class="form-control" name="idCategory" id="Category">
      <?php foreach($cat as $value):?>
      <option value='<?=$value['cat_id'];?>' <?php if($film['category_cat_id'] == $value['cat_id'] ){echo 'selected';} ?>><?=$value['cat_name'];?></option>
      <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <?php if(!isset($_GET['idfilm'])):?>
    <button class="btn btn-success" type="submit" name="submit">Enregistre</button>
    <?php else: ?>
      <button class="btn btn-success" type="submit" name="update">Modifier</button>
    <?php endif; ?>
  </div>
</form>


<?php
$content = ob_get_clean();
require_once '../template.php';