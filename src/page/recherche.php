<?php
$title = 'Recherche';
if(isset($_POST['recherche'])){
    $result = search($_POST['recherche']);
    var_dump($result);
}
ob_start();
?>

<form action="?p=recherche" method="POST" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Recherche" aria-label="Recherche">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ok</button>
</form>

<?php foreach($result as $info):?>
    <label><?= $info['mov_title']; ?></label>
<?php endforeach;?>
<?php
$content= ob_get_clean();

require_once '../template.php';