<?php

$title = 'Blog - Accueil';
$description = '';
$page = 'blog';

?>

<?php ob_start(); ?>

<?php if (isset($_SESSION['id']) AND $_SESSION['rank'] == 2): ?>

    <div class="top-bar-infos">
        <a href="index.php?action=addPost" class="btn-add-post offset-md-3">Ajouter un article</a>
        <hr class="col-md-6 mx-auto">
    </div>

<?php endif ?>

<?php 

while ($data = $posts->fetch()){

?>

<div class="post col-md-6">
    <div class="thumbnail col-md-3 col-sm-5">

        <?php if (file_exists('public/img/blog/thumbnails/' .$data['id'] . '.jpg')): ?>
            <div class="img-post" style="background-image: url(public/img/blog/thumbnails/<?= $data['id'] ?>.jpg)"></div>
        <?php else: ?>
            <img src="public/img/blog/thumbnails/default.jpg" alt="">
        <?php endif ?>
        
    </div>
    <div class="infos">
        <h1>
            <?php 

            if (strlen($data['title']) > 25) {
                $data['title'] = substr($data['title'], 0, 40) .'...';

                echo htmlspecialchars($data['title']);

            } else {
                echo htmlspecialchars($data['title']);
            }

            ?>

        </h1>
        <p>
            <?php 

            if (strlen($data['content']) > 200) {

                $data['content'] = substr($data['content'], 0, 200) .'...';

                echo nl2br(htmlspecialchars($data['content']));

            } else {

                echo nl2br(htmlspecialchars($data['content']));
                
            }

            ?>    
        </p>
        <div class="more">
            <div>
                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire plus</a>
            </div>
            <span><?= $data['author'] .' - ' .strftime("%d %B %Y", strtotime($data['creation_date'])) ?></span>
        </div>
    </div>
</div>

<?php

}
$posts->closeCursor();

?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>