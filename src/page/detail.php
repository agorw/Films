<?php
$title = 'Detail';
if(isset($_GET['idfilm'])){
    $result = detail($_GET['idfilm']);
}else{
    $result = detail(1);
}


ob_start();
?>
<div class="row">
        <img src="<?= $result['mov_poster']; ?>" class="col-4" alt="<?= $result['mov_title']; ?>">
        <div class="col-6">
            <h5><strong><?= $result['mov_title']; ?></strong></h5>
            <p>
            <?= $result['mov_plot']; ?><br><br>
            <label><strong>Liste des Acteurs</strong> </label><br>
            <?= $result['mov_actors']; ?><br><br>


            <label><strong>Chemin du fichier sur votre machine</strong></label><br>
            <?= $result['mov_file_path'];?>
            </p>
        </div>
</div>

<?php
$content= ob_get_clean();