<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center"><?= $data['onePosts']->title ?></h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Titre : <?= htmlspecialchars($data['onePosts']->title) ?></h5>

                    <p class="card-text">Posté par : <?= $data['onePosts']->nom ?></p>

                    <p class="card-text">
                        <small class="text-muted">Posté le : <?= $data['onePosts']->date ?></small>
                    </p>

                    <p class="card-text"><?= htmlspecialchars($data['onePosts']->content) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>