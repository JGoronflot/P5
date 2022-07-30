<?php
$title = 'Se connecter';
$description = '';
$page = 'login';
$page_size = 1;
?>

<?php ob_start(); ?>

<div class="form-sign">
    <form action="" method="POST" class="col-md-3 mx-auto">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <span><?= ($error) ?></span>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="form-sign-username">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" id="form-sign-username" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="form-sign-password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="form-sign-password" required>
            </div>
        </div>
        <button type="submit" class="col-lg-12" name="ssign-login" id="sign-login">Se connecter</button>
        <a href="index.php?action=register" class="already">Pas encore inscrit ?</a>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>