<?php

$title = 'Blog - Modifier un article';
$description = '';
$page = 'blog';

?>

<?php ob_start(); ?>

<div class="back-btn">
    <a href="index.php?action=post&id=<?= htmlentities($post['id']) ?>" class="btn-back-posts offset-md-3"><i class="far fa-chevron-left"></i> Retourner sur la page de l'article</a>
    <hr class="col-md-6 mx-auto">
</div>

<div class="form-add-post" >
    <form action="index.php?action=editPost&id=<?= htmlentities($post['id']) ?>" method="POST" enctype="multipart/form-data" class="col-md-6 mx-auto">

        <?php if (isset($error)) { ?>

            <div class="alert alert-danger ?>" role="alert">
                <span><?= htmlentities($error) ?></span>
            </div>
            
        <?php } ?>

        <p>Les champs indiqués par un asterisque (*) sont obligatoires.</p>
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="form-post-author">Auteur*</label>
                <input type="text" class="form-control" name="author" id="form-post-author" value="<?= htmlentities($post['author']) ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="form-post-title">Titre de l'article*</label>
                <input type="text" class="form-control" name="title" id="form-post-title" value="<?= htmlentities($post['title']) ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="form-post-content">Contenu de l'article*</label>
            <textarea class="form-control" name="content" id="form-post-content" required><?= htmlentities($post['content']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="form-post-thumbnail">Miniature</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="thumbnail" id="form-post-thumbnail">
                <label class="custom-file-label" for="form-post-thumbnail">(Qualité optimale : 800x600)</label>
            </div>
        </div>
        <button type="submit" class="col-lg-3" name="editpost" id="form-contact-send">Modifier l'article</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>