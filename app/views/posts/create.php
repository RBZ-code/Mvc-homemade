<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container mt-5">
    <h2>Poster un nouvel article</h2>
    <form action="<?= URLROOT ?>/posts/create" method="post">
        <div class="form-group">
            <label for="title">Titre de l'article:</label>
            <input type="text" class="form-control <?= empty($data['title_error']) ? '' : 'is-invalid'; ?>" id=" title" name="title">
            <div class="invalid-feedback">
                <?= $data['title_error']; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="content">Contenu de l'article:</label>
            <textarea class="form-control <?= empty($data['content_error']) ? '' : 'is-invalid'; ?>" id="content" name="content" rows="6"></textarea>
            <div class="invalid-feedback">
                <?= $data['content_error']; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="create-post">Poster</button>
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>