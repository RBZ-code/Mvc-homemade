<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container mt-5">
    <h2>Derniers articles</h2>
    <div class="row">
        <?php foreach ($data['posts'] as $post) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->title ?></h5>
                        <p class="card-text">Posté par : <?= $post->nom ?></p>
                        <p class="card-text"><small class="text-muted"><?= $post->date ?></small></p>
                        <p class="card-text"><?= $post->content ?></p>
                        <a href="<?= URLROOT ?>/posts/showDetail/<?= $post->id ?>" class="btn btn-primary">Lire l'article</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>