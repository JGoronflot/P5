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
            <?php if (file_exists('img/blog/thumbnails/' . $post->getID() . '.jpg')) : ?>
                <div class="img-post" style="background-image: url(img/blog/thumbnails/<?= ($post->getID()) ?>.jpg)"></div>
            <?php else : ?>
                <img src="img/blog/thumbnails/default.jpg" alt="">
            <?php endif ?>
        </div>
        <div class="infos">
            <h1>
                <?php
                if (strlen($post->getTitle()) > 25) {
                    $post->title = substr($post->getTitle(), 0, 40) . '...';
                    echo '<a href="index.php?action=post&amp;id='.$post->getID().'">'.htmlspecialchars($post->getTitle()).'</a>';
                } else {
                    echo '<a href="index.php?action=post&amp;id='.$post->getID().'">'.htmlspecialchars($post->getTitle()).'</a>';
                }
                ?>
            </h1>
            <p>
                <?php
                if (strlen($post->getContent()) > 200) {
                    $post->setContent(substr($post->getContent(), 0, 200) . '...');
                    echo (nl2br(htmlspecialchars($post->getContent())));
                } else {
                    echo nl2br(htmlspecialchars($post->getContent()));
                }
                ?>
            </p>
            <div class="more">
                <span><?= ($post->getAuthor()) . ' - ' . utf8_encode(strftime("%d %B %Y", strtotime($post->getCreationDate()))) ?></span>
            </div>
        </div>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
