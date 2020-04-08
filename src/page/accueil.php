<?php
$title = 'Accueil';
if(isset($_POST['recherche'])){
    $result = search($_POST['recherche']);
}else{
    $result = search('');
}
ob_start();
?>

<form action="?p=accueil" method="POST" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" name="recherche" placeholder="Recherche" aria-label="Recherche">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ok</button>
</form>
<br>
<div class="row">
<?php foreach($result as $info):?>
    <div class="card col-3">
        <img src="<?= $info['mov_poster']; ?>" class="card-img-top" alt="<?= $info['mov_title']; ?>">
        <div class="card-body text-center">
            <a href="?p=detail&idfilm=<?= $info['mov_id']; ?>"><h5 class="card-title"><?= $info['mov_title']; ?></h5></a>
        </div>
    </div>
    <?php endforeach;?>
</div>

<?php
$content= ob_get_clean();