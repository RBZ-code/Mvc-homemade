<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container d-flex justify-content-center" style="height: calc(100vh - 56px);">
    <div class="row align-items-center">
        <div class="col-md-6">
            <section class="hero">
                <div class="hero-content">
                    <h1>Bienvenue sur notre blog!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non diam quis turpis dignissim luctus.</p>
                    <a href="<?= URLROOT; ?>/posts/index" class="btn btn-secondary">Découvrir les articles</a>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="about">
                <div class="about-content">
                    <h2>A Toi de Jouer !</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non diam quis turpis dignissim luctus.</p>
                    <a href="<?= URLROOT; ?>/posts/create" class="btn btn-primary">Je Post !</a>
                </div>
            </section>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
