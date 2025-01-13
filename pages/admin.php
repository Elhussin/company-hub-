<?php
include_once 'config.php';
$data = json_decode(file_get_contents('data/links.json'), true);
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Control Panel</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        <?php foreach ($data as $link): ?>
        <!-- Loop Through Links -->
        <div class="col">
            <div class="card shadow">
                <img src="<?= ROOT_PATH?>static/img/<?= $link['image']?>" class="card-img-top bg-info" alt="<?= $link['title'] ?>" style="height: 150px;">'
                <div class="card-body">
                    <h5 class="card-title"><?= $link['title'] ?></h5>
                    <p class="card-text"><?= $link['description'] ?></p>
                    <a href="index.php?page=<?= $link['url'] ?>" class="btn btn-info w-100"><?= $link['title'] ?></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


