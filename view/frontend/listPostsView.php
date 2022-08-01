<?php
$title = 'Blog - Accueil';
$description = '';
$page = 'blog';
?>

<?php ob_start(); ?>

<?php if (isset($_SESSION['id']) && $_SESSION['rank'] == 2) : ?>
    <div class="top-bar-infos">
        <a href="index.php?action=addPost" class="btn-add-post offset-md-3">Ajouter un article</a>
        <hr class="col-md-6 mx-auto">
    </div>
<?php endif ?>
<?php
foreach($posts as $post) {
?>
    <div class="post col-md-6">
        <div class="thumbnail col-md-3 col-sm-5">
            <?php if (file_exists('img/blog/thumbnails/' . $post->id . '.jpg')) : ?>
                <div class="img-post" style="background-image: url(img/blog/thumbnails/<?= ($post->id) ?>.jpg)"></div>
            <?php else : ?>
                <img src="img/blog/thumbnails/default.jpg" alt="">
            <?php endif ?>
        </div>
        <div class="infos">
            <h1>
                <?php
                if (strlen($post->title) > 25) {
                    $post->title = substr($post->title, 0, 40) . '...';
                    echo '<a href="index.php?action=post&amp;id='.$post->id.'">'.htmlspecialchars($post->title).'</a>';
                } else {
                    echo '<a href="index.php?action=post&amp;id='.$post->id.'">'.htmlspecialchars($post->title).'</a>';
                }
                ?>
            </h1>
            <p>
                <?php
                if (strlen($post->content) > 200) {
                    $post->content = substr($post->content, 0, 200) . '...';
                    echo (nl2br(htmlspecialchars($post->content)));
                } else {
                    echo nl2br(htmlspecialchars($post->content));
                }
                ?>
            </p>
            <div class="more">
                <span><?= ($post->author) . ' - ' . strftime("%d %B %Y", strtotime($post->creation_date)) ?></span>
            </div>
        </div>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
