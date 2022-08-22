<?php

$title = 'Gestion des commentaires';
$description = '';
$page = 'admin';

?>

<?php ob_start(); ?>

<div class="comments-manage col-md-8">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="id">#</th>
                    <th class="date">Date</th>
                    <th class="author">Auteur</th>
                    <th class="comment">Commentaire</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($comments as $comment) {
                ?>
                    <tr>
                        <th><?= ($comment->getID()) ?></th>
                        <td><?= utf8_encode(strftime("%d/%m/%y", strtotime($comment->getCommentDate()))) ?></td>
                        <td>
                            <?php
                            if (strlen($comment->getAuthor()) > 19) {
                                $comment->author = substr($comment->getAuthor(), 0, 16) . '...';

                                echo ($comment->getAuthor());
                            } else {
                                echo htmlspecialchars($comment->getAuthor());
                            }
                            ?>
                        </td>
                        <td><?= ($comment->getComment()) ?></td>
                        <td>
                            <a href="index.php?action=approveComment&amp;id=<?= ($comment->getID()) ?>"><i class="fas fa-check-circle fa-2x"></i></a>
                            <a href="index.php?action=disapproveComment&amp;id=<?= ($comment->getID()) ?>"><i class="fas fa-times-circle fa-2x"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
