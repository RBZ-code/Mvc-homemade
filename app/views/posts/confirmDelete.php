<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container mt-5">

    <form action="<?php echo URLROOT; ?>/posts/deletePost/<?= $data['id'] ?>" method="POST">
        <h2>Etes-vous sur de vouloir supprimer cette Article</h2>
        <button type="submit" class="btn btn-danger" name="delete_post">Confirmer</a>
    </form>   
  
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>