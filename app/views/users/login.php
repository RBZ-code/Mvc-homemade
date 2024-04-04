<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container d-flex flex-column justify-content-center" style="height: calc(100vh - 56px);">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Connexion</h2>
                    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?= empty($data['email_error']) ? '' : 'is-invalid'; ?>" id="email" name="email">
                            <div class="invalid-feedback">
                                <?= $data['email_error']; ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control <?= empty($data['password_error']) ? '' : 'is-invalid'; ?>" id="password" name="password">
                            <div class="invalid-feedback">
                                <?= $data['password_error']; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login_submit">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>