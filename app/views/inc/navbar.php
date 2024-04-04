<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>">Framework MVC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>">Accueil</a>
                </li>
                <?php if (checkUserLog()) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/posts/showPostsUser/<?= $_SESSION['user_id'] ?>">Mes Posts</a>
                </li>
                <?php } ?> 
            </ul>
            <ul class="navbar-nav ms-auto">

                <a class="nav-link bienvenu">Bienvenue <span class="nameUser"><?php if (checkUserLog()) { ?><?= $_SESSION['user_name'] ?><?php } ?></span></a>

                <?php if (checkUserLog()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Déconnexion</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Connexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
