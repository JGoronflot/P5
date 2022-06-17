<?php

$title = 'S\'inscrire';
$description = '';
$page = 'register';
$page_size = 1;

?>

<?php ob_start(); ?>

<div class="form-sign" >
    <form action="" method="POST" class="col-md-3 mx-auto">

        <?php if (isset($error)): ?>
            
        <div class="alert alert-danger" role="alert">
            <span><?= $error ?></span>
        </div>

        <?php elseif (isset($success)): ?>

        <div class="alert alert-success" role="alert">
            <span><?= $success ?></span>
            <br>    
            <a href="index.php?action=login" class="btn-back-index"><i class="fal fa-hand-point-right"></i> Redirection vers la page de connexion</a>
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
                <label for="form-sign-email">Adresse email</label>
                <input type="email" class="form-control" name="email" id="form-sign-email" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="form-sign-password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="form-sign-password" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="form-sign-password2">Confirmer mot de passe</label>
                <input type="password" class="form-control" name="password2" id="form-sign-password2" required>
            </div>
        </div>
        <button type="submit" class="col-lg-12" name="sign-register" id="sign-register">S'inscrire</button>
        <a href="index.php?action=login" class="already">Déjà inscrit ?</a>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>