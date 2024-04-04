<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="container mt-5">
    <h2>Modifier l'article</h2>
    <form action="<?= URLROOT ?>/posts/updatePost/<?= $data['onePost']->id ?>" method="post">
        <div class="form-group">
            <label for="title">Titre de l'article:</label>
            <input type="text"  class="form-control <?= empty($data['title_error']) ? '' : 'is-invalid'; ?>" id="title" name="title" value="<?= $data['onePost']->title ?>">
            <div class="invalid-feedback">
                <?= $data['title_error']; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="content">Contenu de l'article:</label>
            <textarea class="form-control <?= empty($data['content_error']) ? '' : 'is-invalid'; ?>" id="content" name="content" rows="6" ><?= $data['onePost']->content ?></textarea>
            <div class="invalid-feedback">
                <?= $data['content_error']; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="updatePost">Modifier</button>
    </form>
</div>
