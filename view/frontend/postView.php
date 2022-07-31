<?php

$title = $post->title;
$description = '';
$page = 'blog';

?>

<?php ob_start(); ?>

<div class="post-header-image" style="background-image: url(img/blog/thumbnails/<?= ($post->id) ?>.jpg)"></div>
<a href="index.php" class="btn-back-posts offset-md-3"><i class="far fa-chevron-left"></i> Retour à la liste des articles</a>
<hr class="col-md-6 mx-auto">
<div class="post-view col-md-6">
    <?php if (isset($_SESSION->id) && $_SESSION->rank == 2) : ?>
        <div class="admin-tools">
            <a href="index.php?action=deletePost&amp;id=<?= ($post->id) ?>" class="tool-delete"><i class="far fa-trash"></i> Supprimer l'article</a>
            <a href="index.php?action=editPost&amp;id=<?= ($post->id) ?>" class="tool-edit"><i class="fal fa-marker"></i> Modifier l'article</a>
        </div>
    <?php endif ?>
</div>
<div class="post-view col-md-6">
    <h1 class="title"><?= ($post->title) ?></h1>
    <span>Par <?= ($post->author) ?> - le <?= strftime("%d %B %Y à %Hh%M", strtotime($post->creation_date)) ?></span>
    <div class="content">
        <p><?= nl2br(($post->content)) ?></p>
    </div>
    <span class="last-update">Dernière modification : <?= (strftime("%d %B %Y à %Hh%M", strtotime($post->update_date))) ?></span>
</div>

<hr class="col-md-6 mx-auto">
<div class="comments col-md-6">
    <h2>Commentaires</h2>
    <div class="form-comment">
        <form action="index.php?action=submitComment&amp;id=<?= ($post->id) ?>" method="POST">
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="form-comment-name">Votre nom</label>
                    <input type="text" class="form-control" name="author" id="form-comment-name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="form-comment-comment">Votre commentaire</label>
                <textarea class="form-control" name="comment" id="form-comment-comment" required></textarea>
            </div>
            <button type="submit" class="col-lg-3" name="send-comment" id="form-comment-send">Soumettre</button>
        </form>
    </div>
    <?php
    foreach($comments as $comment) {
        if ($comment->status == 1){
    ?>
            <div class="comment">
                <div>
                    <img src="img/users/default.jpg" alt="" class="avatar">
                </div>
                <div>
                    <span class="author"><?= ($comment->author) ?></span>
                    <br>
                    <span class="comment-date">le <?= (strftime("%d/%m/%Y à %Hh%M", strtotime($comment->comment_date))) ?></span>
                </div>
                <p class="content"><?= (nl2br(htmlspecialchars($comment->comment))) ?></p>
            </div>
    <?php
        }
    }
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>